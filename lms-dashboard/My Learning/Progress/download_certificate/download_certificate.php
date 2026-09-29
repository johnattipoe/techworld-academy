<?php
session_start();
if (($_SESSION['role'] ?? '') !== 'student' || empty($_SESSION['user_id'])) { header('Location: /authenication/login/login.php'); exit; }
require_once(__DIR__ . '/../../../../Database/db/db.php');
require_once(__DIR__ . '/../../../fpdf/fpdf/fpdf.php');
$conn = get_db();
$user_id = (int)$_SESSION['user_id'];
$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
if (!$course_id) { http_response_code(400); exit('A valid course is required.'); }
try {
    $stmt = $conn->prepare("SELECT cert.certificate_number,cert.issued_at,e.progress,e.completed_at,e.created_at AS enrolled_at,c.title AS course_title,c.duration,u.full_name AS instructor,us.full_name AS student_name,cat.name AS category FROM certificates cert JOIN enrollments e ON e.course_id=cert.course_id AND e.user_id=cert.user_id JOIN courses c ON c.id=e.course_id JOIN users us ON us.id=e.user_id LEFT JOIN users u ON u.id=c.instructor_id LEFT JOIN categories cat ON cat.id=c.category_id WHERE cert.course_id=? AND cert.user_id=? AND e.progress>=100 LIMIT 1");
    $stmt->execute([$course_id,$user_id]);
    $cert=$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$cert) { http_response_code(404); exit('Certificate not found for this completed course.'); }
    $cert_id=$cert['certificate_number'];
} catch (PDOException $e) {
    error_log('Certificate lookup failed: '.$e->getMessage()); http_response_code(500); exit('Unable to retrieve this certificate right now.');
}
$issue_date = $cert['completed_at'] ?? $cert['issued_at'] ?? date('Y-m-d');
// Create PDF Certificate
class CertificatePDF extends FPDF
{
    function Header()
    {
        // Border
        $this->SetLineWidth(2);
        $this->SetDrawColor(102, 126, 234);
        $this->Rect(10, 10, 277, 180, 'D');
        
        $this->SetLineWidth(0.5);
        $this->Rect(15, 15, 267, 170, 'D');
    }
    
    function Footer()
    {
        $this->SetY(-30);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(128, 128, 128);
        $this->Cell(0, 10, 'This is an official certificate from TechWorld Academy & Solutions', 0, 1, 'C');
    }
    
    function Circle(float $x, float $y, float $r, string $style = 'D')
    {
        $this->Ellipse($x, $y, $r, $r, $style);
    }
    
    function Ellipse(float $x, float $y, float $rx, float $ry, string $style = 'D')
    {
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $lx=4/3*(M_SQRT2-1)*$rx;
        $ly=4/3*(M_SQRT2-1)*$ry;
        $k=$this->k;
        $h=$this->h;
        $this->_out(sprintf('%.2F %.2F m %.2F %.2F %.2F %.2F %.2F %.2F c',
            ($x+$rx)*$k,($h-$y)*$k,
            ($x+$rx)*$k,($h-($y-$ly))*$k,
            ($x+$lx)*$k,($h-($y-$ry))*$k,
            $x*$k,($h-($y-$ry))*$k));
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
            ($x-$lx)*$k,($h-($y-$ry))*$k,
            ($x-$rx)*$k,($h-($y-$ly))*$k,
            ($x-$rx)*$k,($h-$y)*$k));
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
            ($x-$rx)*$k,($h-($y+$ly))*$k,
            ($x-$lx)*$k,($h-($y+$ry))*$k,
            $x*$k,($h-($y+$ry))*$k));
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c %s',
            ($x+$lx)*$k,($h-($y+$ry))*$k,
            ($x+$rx)*$k,($h-($y+$ly))*$k,
            ($x+$rx)*$k,($h-$y)*$k,
            $op));
    }
}

// Create PDF in landscape mode
$pdf = new CertificatePDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);

// Logo/Icon (using circle with text)
$pdf->SetFillColor(102, 126, 234);
$pdf->Circle(148.5, 40, 15, 'F');
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetXY(138.5, 33);
$pdf->Cell(20, 10, 'TW', 0, 1, 'C');

// Certificate Title
$pdf->SetTextColor(102, 126, 234);
$pdf->SetFont('Arial', 'B', 36);
$pdf->SetXY(20, 60);
$pdf->Cell(257, 15, 'Certificate', 0, 1, 'C');

$pdf->SetFont('Arial', '', 14);
$pdf->SetTextColor(100, 100, 100);
$pdf->SetXY(20, 75);
$pdf->Cell(257, 8, 'OF COMPLETION', 0, 1, 'C');

// Presented to
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(128, 128, 128);
$pdf->SetXY(20, 90);
$pdf->Cell(257, 6, 'This is to certify that', 0, 1, 'C');

// Student Name
$pdf->SetFont('Arial', 'BI', 24);
$pdf->SetTextColor(51, 51, 51);
$pdf->SetXY(20, 98);
$pdf->Cell(257, 12, $cert['student_name'] ?? $_SESSION['username'], 0, 1, 'C');

// Line under name
$pdf->SetDrawColor(102, 126, 234);
$pdf->SetLineWidth(0.5);
$pdf->Line(100, 110, 197, 110);

// Has completed
$pdf->SetFont('Arial', '', 11);
$pdf->SetTextColor(85, 85, 85);
$pdf->SetXY(20, 115);
$pdf->Cell(257, 6, 'has successfully completed the online course', 0, 1, 'C');

// Course Title
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetTextColor(102, 126, 234);
$pdf->SetXY(20, 125);
$pdf->Cell(257, 10, $cert['course_title'], 0, 1, 'C');

// Completion details
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(85, 85, 85);
$pdf->SetXY(20, 138);
$completion_text = 'with a completion rate of ' . $cert['progress'] . '% on ' . date('F d, Y', strtotime($issue_date));
$pdf->Cell(257, 6, $completion_text, 0, 1, 'C');

// Signatures
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(51, 51, 51);

// Instructor signature
$pdf->SetXY(50, 160);
$pdf->Cell(60, 5, $cert['instructor'] ?? 'TechWorld Academy', 0, 1, 'C');
$pdf->SetDrawColor(51, 51, 51);
$pdf->Line(50, 159, 110, 159);
$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(102, 102, 102);
$pdf->SetXY(50, 165);
$pdf->Cell(60, 4, 'Course Instructor', 0, 1, 'C');

// Director signature
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(51, 51, 51);
$pdf->SetXY(187, 160);
$pdf->Cell(60, 5, 'TechWorld Academy', 0, 1, 'C');
$pdf->Line(187, 159, 247, 159);
$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(102, 102, 102);
$pdf->SetXY(187, 165);
$pdf->Cell(60, 4, 'Director', 0, 1, 'C');

// Certificate ID
$pdf->SetFont('Arial', 'I', 8);
$pdf->SetTextColor(153, 153, 153);
$pdf->SetXY(20, 178);
$pdf->Cell(257, 4, 'Certificate ID: ' . $cert_id . ' | Verification: https://techworld.edu/verify/' . $cert_id, 0, 1, 'C');

// Output PDF
$filename = 'Certificate_' . str_replace(' ', '_', $cert['course_title']) . '_' . $cert_id . '.pdf';
$pdf->Output('D', $filename);

