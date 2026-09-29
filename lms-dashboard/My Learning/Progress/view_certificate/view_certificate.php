<?php
session_start();
$dashboardLanguageScope = 'lms';
require_once dirname(__DIR__, 4) . '/utils/i18n/dashboard.php';
require_once(__DIR__ . '/..\..\..\..\Database\db\db.php');

if(!isset($_SESSION['user_id'])) {
    header("Location: ../../../authenication/login.php");
    exit();
}

$conn = get_db();
$user_id = $_SESSION['user_id'];
$course_id = $_GET['course_id'] ?? 0;

// Fetch certificate data
try {
    $stmt = $conn->prepare("
        SELECT 
            e.id as enrollment_id,
            e.enrolled_at,
            e.progress,
            e.completed_at,
            c.id as course_id,
            c.title as course_title,
            c.description,
            c.duration,
            u.full_name as instructor,
            us.full_name as student_name,
            cat.name as category
        FROM enrollments e
        INNER JOIN courses c ON e.course_id = c.id
        INNER JOIN users us ON e.user_id = us.id
        LEFT JOIN users u ON c.instructor_id = u.id
        LEFT JOIN categories cat ON c.category_id = cat.id
        WHERE e.course_id = :course_id 
        AND e.user_id = :user_id
        AND e.progress = 100
    ");
    $stmt->execute(['course_id' => $course_id, 'user_id' => $user_id]);
    $cert = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$cert) {
        die("Certificate not found or course not completed");
    }
    
    // Generate certificate ID
    $cert_id = 'CERT-' . date('Y', strtotime($cert['completed_at'] ?? $cert['enrolled_at'])) . '-' . str_pad($cert['enrollment_id'], 3, '0', STR_PAD_LEFT);
    
} catch (PDOException $e) {
    die("Error fetching certificate: " . $e->getMessage());
}

$issue_date = $cert['completed_at'] ?? date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($dashboardLocale, ENT_QUOTES, 'UTF-8') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate - <?php echo htmlspecialchars($cert['course_title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&display=swap');
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .certificate-container {
            background: white;
            max-width: 1000px;
            width: 100%;
            padding: 60px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            border: 20px solid #fff;
            outline: 2px solid #667eea;
            position: relative;
        }
        
        .certificate-border {
            border: 3px double #667eea;
            padding: 40px;
        }
        
        .certificate-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .certificate-logo {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .certificate-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .certificate-subtitle {
            font-size: 18px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        
        .certificate-body {
            text-align: center;
            margin: 40px 0;
        }
        
        .presented-to {
            font-size: 16px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        
        .student-name {
            font-family: 'Great Vibes', cursive;
            font-size: 64px;
            color: #333;
            margin: 20px 0;
            border-bottom: 2px solid #667eea;
            display: inline-block;
            padding: 0 30px 10px;
        }
        
        .certificate-text {
            font-size: 18px;
            color: #555;
            line-height: 1.8;
            margin: 30px 0;
        }
        
        .course-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: #667eea;
            margin: 20px 0;
        }
        
        .certificate-footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        
        .signature-block {
            text-align: center;
            flex: 1;
        }
        
        .signature-line {
            border-top: 2px solid #333;
            margin-bottom: 10px;
            padding-top: 5px;
        }
        
        .signature-name {
            font-weight: 700;
            color: #333;
        }
        
        .signature-title {
            font-size: 14px;
            color: #666;
        }
        
        .certificate-seal {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            position: absolute;
            bottom: 40px;
            right: 40px;
        }
        
        .certificate-id {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #999;
        }
        
        .action-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        
        @media print {
            body {
                background: white;
            }
            .action-buttons {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="action-buttons">
<div class="dropdown dashboard-language d-inline-block me-2"><button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Language"><?= strtoupper(htmlspecialchars($dashboardLanguage, ENT_QUOTES, 'UTF-8')) ?></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" lang="en" href="<?= htmlspecialchars(dashboard_lang_url('en'), ENT_QUOTES, 'UTF-8') ?>">English</a></li><li><a class="dropdown-item" lang="es" href="<?= htmlspecialchars(dashboard_lang_url('es'), ENT_QUOTES, 'UTF-8') ?>">Español</a></li><li><a class="dropdown-item" lang="fr" href="<?= htmlspecialchars(dashboard_lang_url('fr'), ENT_QUOTES, 'UTF-8') ?>">Français</a></li></ul></div>
        <button onclick="window.print()" class="btn btn-primary me-2">
            <i class="bi bi-printer"></i> Print
        </button>
        <a href="download_certificate.php?id=<?php echo $cert_id; ?>" class="btn btn-success me-2">
            <i class="bi bi-download"></i> Download PDF
        </a>
        <a href="certificates.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="certificate-container">
        <div class="certificate-border">
            <div class="certificate-header">
                <div class="certificate-logo">
                    <i class="bi bi-mortarboard-fill text-white" style="font-size: 50px;"></i>
                </div>
                <h1 class="certificate-title">Certificate</h1>
                <p class="certificate-subtitle">of Completion</p>
            </div>
            
            <div class="certificate-body">
                <p class="presented-to">This is to certify that</p>
                <h2 class="student-name"><?php echo htmlspecialchars($cert['student_name'] ?? $_SESSION['username']); ?></h2>
                
                <p class="certificate-text">
                    has successfully completed the online course
                </p>
                
                <h3 class="course-title"><?php echo htmlspecialchars($cert['course_title']); ?></h3>
                
                <p class="certificate-text">
                    with a completion rate of <strong><?php echo $cert['progress']; ?>%</strong><br>
                    on <strong><?php echo date('F d, Y', strtotime($issue_date)); ?></strong>
                </p>
            </div>
            
            <div class="certificate-footer">
                <div class="signature-block">
                    <div class="signature-line">
                        <?php echo htmlspecialchars($cert['instructor'] ?? 'TechWorld Academy'); ?>
                    </div>
                    <div class="signature-name">Course Instructor</div>
                    <div class="signature-title"><?php echo htmlspecialchars($cert['category'] ?? 'Technology'); ?> Department</div>
                </div>
                
                <div style="flex: 0.5;"></div>
                
                <div class="signature-block">
                    <div class="signature-line">
                        TechWorld Academy
                    </div>
                    <div class="signature-name">Director</div>
                    <div class="signature-title">TechWorld Academy & Solutions</div>
                </div>
            </div>
            
            <div class="certificate-seal">
                <i class="bi bi-award-fill text-white" style="font-size: 60px;"></i>
            </div>
            
            <div class="certificate-id">
                <strong>Certificate ID:</strong> <?php echo $cert_id; ?><br>
                <strong>Verification URL:</strong> https://techworld.edu/verify/<?php echo $cert_id; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
