-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2026 at 10:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techworld_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `priority` enum('low','medium','high') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `read_time` varchar(50) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `likes` int(11) DEFAULT 0,
  `featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `category`, `content`, `excerpt`, `image`, `published_date`, `read_time`, `views`, `likes`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'The Future of Artificial Intelligence', 'Dr. Emily Rodriguez', 'AI & ML', NULL, 'AI is transforming industries at an unprecedented pace. Explore the key trends and technologies shaping the future of artificial intelligence.', NULL, '2024-02-15', '8 min read', 12500, 890, 1, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(2, '5 Cybersecurity Best Practices for 2024', 'Prof. David Williams', 'Security', NULL, 'Protect yourself online with these essential security practices. Learn how to stay safe in an increasingly digital world.', NULL, '2024-02-12', '6 min read', 9800, 650, 1, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(3, 'Getting Started with Machine Learning', 'Sarah Johnson', 'AI & ML', NULL, 'A comprehensive guide for beginners to understand machine learning concepts, algorithms, and practical applications.', NULL, '2024-02-10', '10 min read', 15200, 1100, 0, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(4, 'Web Development Trends in 2024', 'Mike Davis', 'Web Development', NULL, 'Discover the latest trends in web development including new frameworks, tools, and best practices for modern websites.', NULL, '2024-02-08', '7 min read', 11400, 780, 0, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(5, 'Python vs JavaScript: Which to Learn First?', 'Alex Thompson', 'Programming', NULL, 'An in-depth comparison of Python and JavaScript to help you decide which programming language to learn first.', NULL, '2024-02-05', '9 min read', 18900, 1450, 1, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(6, 'Cloud Computing Essentials', 'Dr. Michael Brown', 'Cloud Computing', NULL, 'Understanding the fundamentals of cloud computing and how it benefits modern businesses.', NULL, '2024-02-01', '12 min read', 8500, 620, 0, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(7, 'The Future of Artificial Intelligence', 'Dr. Emily Rodriguez', 'AI & ML', NULL, 'AI is transforming industries at an unprecedented pace. Explore the key trends and technologies shaping the future of artificial intelligence.', NULL, '2024-02-15', '8 min read', 12500, 890, 1, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(8, '5 Cybersecurity Best Practices for 2024', 'Prof. David Williams', 'Security', NULL, 'Protect yourself online with these essential security practices. Learn how to stay safe in an increasingly digital world.', NULL, '2024-02-12', '6 min read', 9800, 650, 1, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(9, 'Getting Started with Machine Learning', 'Sarah Johnson', 'AI & ML', NULL, 'A comprehensive guide for beginners to understand machine learning concepts, algorithms, and practical applications.', NULL, '2024-02-10', '10 min read', 15200, 1100, 0, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(10, 'Web Development Trends in 2024', 'Mike Davis', 'Web Development', NULL, 'Discover the latest trends in web development including new frameworks, tools, and best practices for modern websites.', NULL, '2024-02-08', '7 min read', 11400, 780, 0, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(11, 'Python vs JavaScript: Which to Learn First?', 'Alex Thompson', 'Programming', NULL, 'An in-depth comparison of Python and JavaScript to help you decide which programming language to learn first.', NULL, '2024-02-05', '9 min read', 18900, 1450, 1, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(12, 'Cloud Computing Essentials', 'Dr. Michael Brown', 'Cloud Computing', NULL, 'Understanding the fundamentals of cloud computing and how it benefits modern businesses.', NULL, '2024-02-01', '12 min read', 8500, 620, 0, '2025-12-27 12:27:12', '2025-12-27 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

CREATE TABLE `article_tags` (
  `article_id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`article_id`, `tag`) VALUES
(1, 'AI'),
(1, 'Future'),
(1, 'Technology'),
(2, 'Best Practices'),
(2, 'Privacy'),
(2, 'Security'),
(3, 'Beginner'),
(3, 'Machine Learning'),
(3, 'Tutorial'),
(4, 'JavaScript'),
(4, 'Trends'),
(4, 'Web Dev'),
(5, 'Comparison'),
(5, 'JavaScript'),
(5, 'Python'),
(6, 'AWS'),
(6, 'Azure'),
(6, 'Cloud');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `course_id`, `title`, `description`, `due_date`, `created_at`) VALUES
(1, 1, 'Leadership Essay', 'Write an essay on leadership.', '2025-11-01', '2025-10-15 16:13:23'),
(2, 2, 'Build a Website', 'Create a responsive website.', '2025-11-10', '2025-10-15 16:13:23'),
(3, 3, 'Productivity Plan', 'Submit your personal productivity plan.', '2025-11-15', '2025-10-15 16:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submissions`
--

CREATE TABLE `assignment_submissions` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('submitted','graded','returned','late') COLLATE utf8mb4_unicode_ci DEFAULT 'submitted',
  `points_earned` int(11) DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graded_by` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `graded_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `icon`, `is_active`, `created_at`) VALUES
(1, 'Development', 'development', 'Web development, mobile apps, and software engineering', 'bi-code-slash', 1, '2025-12-27 09:07:01'),
(2, 'Data Science', 'data-science', 'Data analysis, machine learning, and AI', 'bi-graph-up', 1, '2025-12-27 09:07:01'),
(3, 'Business', 'business', 'Entrepreneurship, management, and business strategy', 'bi-briefcase', 1, '2025-12-27 09:07:01'),
(4, 'Design', 'design', 'UI/UX design, graphic design, and creative skills', 'bi-palette', 1, '2025-12-27 09:07:01'),
(5, 'Marketing', 'marketing', 'Digital marketing, SEO, and social media', 'bi-megaphone', 1, '2025-12-27 09:07:01'),
(6, 'IT & Software', 'it-software', 'Networking, cloud computing, and system administration', 'bi-hdd-network', 1, '2025-12-27 09:07:01'),
(7, 'Personal Development', 'personal-development', 'Productivity, leadership, and soft skills', 'bi-person-badge', 1, '2025-12-27 09:07:01'),
(8, 'Photography', 'photography', 'Digital photography and photo editing', 'bi-camera', 1, '2025-12-27 09:07:01'),
(9, 'Music', 'music', 'Music production, instruments, and theory', 'bi-music-note-beamed', 1, '2025-12-27 09:07:01'),
(10, 'Finance', 'finance', 'Accounting, investing, and financial management', 'bi-currency-dollar', 1, '2025-12-27 09:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `certificate_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pdf_path` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `times_used` int(11) DEFAULT 0,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `is_published` tinyint(1) DEFAULT 1,
  `is_active` tinyint(1) DEFAULT 1,
  `price` decimal(10,2) DEFAULT 0.00,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level` varchar(50) DEFAULT 'Beginner',
  `duration` varchar(50) DEFAULT '40 hours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `category`, `instructor_id`, `category_id`, `created_at`, `status`, `is_published`, `is_active`, `price`, `updated_at`, `level`, `duration`) VALUES
(1, 'Business Leadership', 'Learn leadership skills for business.', 'Business', 3, 1, '2025-10-15 16:13:23', 'active', 1, 1, '49.99', '2025-12-27 09:48:59', 'Beginner', '40 hours'),
(2, 'Web Development', 'Full stack web development course.', 'Technology', 3, 1, '2025-10-15 16:13:23', 'active', 1, 1, '49.99', '2025-12-27 09:48:59', 'Beginner', '40 hours'),
(3, 'Personal Productivity', 'Boost your productivity.', 'Personal Development', 2, 1, '2025-10-15 16:13:23', 'active', 1, 1, '49.99', '2025-12-27 09:48:59', 'Beginner', '40 hours');

-- --------------------------------------------------------

--
-- Table structure for table `course_lessons`
--

CREATE TABLE `course_lessons` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson_type` enum('video','text','quiz','assignment','resource') COLLATE utf8mb4_unicode_ci DEFAULT 'video',
  `video_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_duration` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` int(11) NOT NULL DEFAULT 1,
  `is_free_preview` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lessons`
--

INSERT INTO `course_lessons` (`id`, `module_id`, `title`, `description`, `content`, `lesson_type`, `video_url`, `video_duration`, `order_number`, `is_free_preview`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is Web Development?', 'Overview of web development, career paths, and technologies', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '10:30', 1, 1, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(2, 1, 'Setting up your environment', 'Install and configure VS Code, browsers, and essential tools', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '15:20', 2, 1, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(3, 1, 'Your first webpage', 'Create a simple HTML page and understand the basic structure', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '20:15', 3, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(4, 1, 'Quiz: Introduction', 'Test your knowledge of web development basics', NULL, 'quiz', NULL, '5:00', 4, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(5, 2, 'HTML Structure and Tags', 'Learn about HTML document structure and common tags', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '18:45', 1, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(6, 2, 'Forms and Input Elements', 'Create interactive forms with various input types', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '22:30', 2, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(7, 2, 'Semantic HTML', 'Use semantic HTML5 elements for better structure and SEO', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '16:20', 3, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(8, 2, 'Practice: Build a Form', 'Hands-on project to create a complete registration form', NULL, 'assignment', NULL, '30:00', 4, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(9, 3, 'CSS Selectors and Properties', 'Master CSS selectors and common styling properties', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '25:15', 1, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(10, 3, 'Flexbox Layout', 'Learn modern layout techniques with CSS Flexbox', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '30:20', 2, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(11, 3, 'Grid System', 'Build complex layouts using CSS Grid', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '28:45', 3, 0, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(12, 1, 'What is Web Development?', 'Overview of web development, career paths, and technologies', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '10:30', 1, 1, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(13, 1, 'Setting up your environment', 'Install and configure VS Code, browsers, and essential tools', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '15:20', 2, 1, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(14, 1, 'Your first webpage', 'Create a simple HTML page and understand the basic structure', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '20:15', 3, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(15, 1, 'Quiz: Introduction', 'Test your knowledge of web development basics', NULL, 'quiz', NULL, '5:00', 4, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(16, 2, 'HTML Structure and Tags', 'Learn about HTML document structure and common tags', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '18:45', 1, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(17, 2, 'Forms and Input Elements', 'Create interactive forms with various input types', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '22:30', 2, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(18, 2, 'Semantic HTML', 'Use semantic HTML5 elements for better structure and SEO', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '16:20', 3, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(19, 2, 'Practice: Build a Form', 'Hands-on project to create a complete registration form', NULL, 'assignment', NULL, '30:00', 4, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(20, 3, 'CSS Selectors and Properties', 'Master CSS selectors and common styling properties', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '25:15', 1, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(21, 3, 'Flexbox Layout', 'Learn modern layout techniques with CSS Flexbox', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '30:20', 2, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(22, 3, 'Grid System', 'Build complex layouts using CSS Grid', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '28:45', 3, 0, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(23, 1, 'What is Web Development?', 'Overview of web development, career paths, and technologies', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '10:30', 1, 1, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(24, 1, 'Setting up your environment', 'Install and configure VS Code, browsers, and essential tools', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '15:20', 2, 1, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(25, 1, 'Your first webpage', 'Create a simple HTML page and understand the basic structure', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '20:15', 3, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(26, 1, 'Quiz: Introduction', 'Test your knowledge of web development basics', NULL, 'quiz', NULL, '5:00', 4, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(27, 2, 'HTML Structure and Tags', 'Learn about HTML document structure and common tags', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '18:45', 1, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(28, 2, 'Forms and Input Elements', 'Create interactive forms with various input types', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '22:30', 2, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(29, 2, 'Semantic HTML', 'Use semantic HTML5 elements for better structure and SEO', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '16:20', 3, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(30, 2, 'Practice: Build a Form', 'Hands-on project to create a complete registration form', NULL, 'assignment', NULL, '30:00', 4, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(31, 3, 'CSS Selectors and Properties', 'Master CSS selectors and common styling properties', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '25:15', 1, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(32, 3, 'Flexbox Layout', 'Learn modern layout techniques with CSS Flexbox', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '30:20', 2, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(33, 3, 'Grid System', 'Build complex layouts using CSS Grid', NULL, 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', '28:45', 3, 0, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE `course_modules` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`id`, `course_id`, `title`, `description`, `order_number`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Introduction to Web Development', 'Get started with web development fundamentals and set up your development environment', 1, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(2, 1, 'HTML Fundamentals', 'Learn HTML structure, tags, and semantic markup for building web pages', 2, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(3, 1, 'CSS Styling', 'Master CSS styling, layouts, and responsive design techniques', 3, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(4, 1, 'JavaScript Basics', 'Introduction to JavaScript programming and DOM manipulation', 4, 1, '2025-12-27 01:56:23', '2025-12-27 01:56:23'),
(5, 1, 'Introduction to Web Development', 'Get started with web development fundamentals and set up your development environment', 1, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(6, 1, 'HTML Fundamentals', 'Learn HTML structure, tags, and semantic markup for building web pages', 2, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(7, 1, 'CSS Styling', 'Master CSS styling, layouts, and responsive design techniques', 3, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(8, 1, 'JavaScript Basics', 'Introduction to JavaScript programming and DOM manipulation', 4, 1, '2025-12-27 02:03:24', '2025-12-27 02:03:24'),
(9, 1, 'Introduction to Web Development', 'Get started with web development fundamentals and set up your development environment', 1, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(10, 1, 'HTML Fundamentals', 'Learn HTML structure, tags, and semantic markup for building web pages', 2, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(11, 1, 'CSS Styling', 'Master CSS styling, layouts, and responsive design techniques', 3, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07'),
(12, 1, 'JavaScript Basics', 'Introduction to JavaScript programming and DOM manipulation', 4, 1, '2025-12-27 12:04:07', '2025-12-27 12:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `course_reviews`
--

CREATE TABLE `course_reviews` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helpful_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_tags`
--

CREATE TABLE `course_tags` (
  `course_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_views`
--

CREATE TABLE `course_views` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_views`
--

INSERT INTO `course_views` (`id`, `user_id`, `course_id`, `viewed_at`) VALUES
(1, 1, 1, '2025-12-27 09:48:22'),
(2, 1, 2, '2025-12-27 06:48:22'),
(3, 1, 1, '2025-12-26 11:48:22'),
(4, 1, 3, '2025-12-25 11:48:22'),
(5, 1, 2, '2025-12-24 11:48:22'),
(6, 1, 1, '2025-12-27 10:03:44'),
(7, 1, 2, '2025-12-27 07:03:44'),
(8, 1, 1, '2025-12-26 12:03:44'),
(9, 1, 3, '2025-12-25 12:03:44'),
(10, 1, 2, '2025-12-24 12:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_type` varchar(20) DEFAULT NULL,
  `file_size` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `downloads` int(11) DEFAULT 0,
  `uploaded_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `course_name`, `category`, `description`, `file_type`, `file_size`, `file_path`, `pages`, `downloads`, `uploaded_date`, `created_at`, `updated_at`) VALUES
(1, 'Programming Fundamentals - Complete Guide', 'Introduction to Programming', 'Programming', 'Comprehensive guide covering all programming fundamentals', 'PDF', '2.5 MB', 'programming-fundamentals.pdf', 120, 1250, '2024-02-15', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(2, 'Data Structures and Algorithms', 'Computer Science Essentials', 'Computer Science', 'Deep dive into data structures and algorithm analysis', 'PDF', '3.8 MB', 'data-structures-algorithms.pdf', 180, 890, '2024-02-10', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(3, 'Web Development Handbook', 'Full Stack Web Development', 'Web Development', 'Complete handbook for modern web development', 'PDF', '4.2 MB', 'web-development.pdf', 200, 1560, '2024-02-08', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(4, 'Python for Data Science', 'Data Science with Python', 'Data Science', 'Python programming for data analysis and visualization', 'PDF', '3.2 MB', 'python-data-science.pdf', 150, 2100, '2024-02-05', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(5, 'Machine Learning Notes', 'Introduction to Machine Learning', 'AI & ML', 'Lecture notes on machine learning concepts', 'DOCX', '1.8 MB', 'machine-learning-notes.docx', 95, 780, '2024-02-01', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(6, 'Cybersecurity Best Practices', 'Cybersecurity Fundamentals', 'Security', 'Essential security practices and protocols', 'PDF', '2.1 MB', 'cybersecurity-practices.pdf', 110, 1340, '2024-01-28', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(7, 'Programming Fundamentals - Complete Guide', 'Introduction to Programming', 'Programming', 'Comprehensive guide covering all programming fundamentals', 'PDF', '2.5 MB', 'programming-fundamentals.pdf', 120, 1250, '2024-02-15', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(8, 'Data Structures and Algorithms', 'Computer Science Essentials', 'Computer Science', 'Deep dive into data structures and algorithm analysis', 'PDF', '3.8 MB', 'data-structures-algorithms.pdf', 180, 890, '2024-02-10', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(9, 'Web Development Handbook', 'Full Stack Web Development', 'Web Development', 'Complete handbook for modern web development', 'PDF', '4.2 MB', 'web-development.pdf', 200, 1560, '2024-02-08', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(10, 'Python for Data Science', 'Data Science with Python', 'Data Science', 'Python programming for data analysis and visualization', 'PDF', '3.2 MB', 'python-data-science.pdf', 150, 2100, '2024-02-05', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(11, 'Machine Learning Notes', 'Introduction to Machine Learning', 'AI & ML', 'Lecture notes on machine learning concepts', 'DOCX', '1.8 MB', 'machine-learning-notes.docx', 95, 780, '2024-02-01', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(12, 'Cybersecurity Best Practices', 'Cybersecurity Fundamentals', 'Security', 'Essential security practices and protocols', 'PDF', '2.1 MB', 'cybersecurity-practices.pdf', 110, 1340, '2024-01-28', '2025-12-27 12:27:12', '2025-12-27 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `file_size` varchar(50) DEFAULT NULL,
  `file_format` varchar(20) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `published_year` varchar(10) DEFAULT NULL,
  `language` varchar(50) DEFAULT 'English',
  `difficulty_level` enum('Beginner','Intermediate','Advanced') DEFAULT 'Beginner',
  `rating` decimal(3,2) DEFAULT 0.00,
  `downloads` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `title`, `author`, `category`, `description`, `pages`, `file_size`, `file_format`, `file_path`, `isbn`, `published_year`, `language`, `difficulty_level`, `rating`, `downloads`, `created_at`, `updated_at`) VALUES
(1, 'Web Development Fundamentals', 'John Smith', 'Web Development', 'Complete guide to modern web development covering HTML, CSS, JavaScript, and frameworks', 450, '5.2 MB', 'PDF', 'web-development-fundamentals.pdf', '978-1234567890', '2024', 'English', 'Beginner', '4.80', 5200, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(2, 'Data Science for Beginners', 'Dr. Emily Chen', 'Data Science', 'Comprehensive introduction to data science with Python, statistics, and machine learning', 520, '6.8 MB', 'PDF', 'data-science-for-beginners.pdf', '978-0987654321', '2024', 'English', 'Beginner', '4.90', 6800, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(3, 'Cybersecurity Basics', 'Prof. David Williams', 'Security', 'Essential cybersecurity concepts, threats, and defense strategies', 380, '4.5 MB', 'PDF', 'cybersecurity-basics.pdf', '978-1122334455', '2023', 'English', 'Beginner', '4.70', 4100, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(4, 'Advanced Python Programming', 'Sarah Johnson', 'Programming', 'Master advanced Python concepts including OOP, decorators, generators, and async programming', 600, '7.5 MB', 'PDF', 'advanced-python.pdf', '978-5566778899', '2024', 'English', 'Advanced', '4.90', 7200, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(5, 'Machine Learning Mastery', 'Dr. Robert Fox', 'AI & ML', 'Complete guide to machine learning algorithms and practical implementations', 550, '8.2 MB', 'PDF', 'machine-learning-mastery.pdf', '978-9988776655', '2024', 'English', 'Advanced', '4.80', 6500, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(6, 'Web Development Fundamentals', 'John Smith', 'Web Development', 'Complete guide to modern web development covering HTML, CSS, JavaScript, and frameworks', 450, '5.2 MB', 'PDF', 'web-development-fundamentals.pdf', '978-1234567890', '2024', 'English', 'Beginner', '4.80', 5200, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(7, 'Data Science for Beginners', 'Dr. Emily Chen', 'Data Science', 'Comprehensive introduction to data science with Python, statistics, and machine learning', 520, '6.8 MB', 'PDF', 'data-science-for-beginners.pdf', '978-0987654321', '2024', 'English', 'Beginner', '4.90', 6800, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(8, 'Cybersecurity Basics', 'Prof. David Williams', 'Security', 'Essential cybersecurity concepts, threats, and defense strategies', 380, '4.5 MB', 'PDF', 'cybersecurity-basics.pdf', '978-1122334455', '2023', 'English', 'Beginner', '4.70', 4100, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(9, 'Advanced Python Programming', 'Sarah Johnson', 'Programming', 'Master advanced Python concepts including OOP, decorators, generators, and async programming', 600, '7.5 MB', 'PDF', 'advanced-python.pdf', '978-5566778899', '2024', 'English', 'Advanced', '4.90', 7200, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(10, 'Machine Learning Mastery', 'Dr. Robert Fox', 'AI & ML', 'Complete guide to machine learning algorithms and practical implementations', 550, '8.2 MB', 'PDF', 'machine-learning-mastery.pdf', '978-9988776655', '2024', 'English', 'Advanced', '4.80', 6500, '2025-12-27 12:27:12', '2025-12-27 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` enum('active','completed','dropped','expired') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `progress` decimal(5,2) DEFAULT 0.00,
  `completed_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_accessed` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `entity_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) DEFAULT 0,
  `downloads` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installment_plans`
--

CREATE TABLE `installment_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `down_payment` decimal(10,2) DEFAULT 0.00,
  `number_of_installments` int(11) NOT NULL,
  `installment_amount` decimal(10,2) NOT NULL,
  `interval_type` enum('week','month','quarter','year') COLLATE utf8mb4_unicode_ci DEFAULT 'month',
  `interval_value` int(11) DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installment_plans`
--

INSERT INTO `installment_plans` (`id`, `course_id`, `plan_name`, `total_amount`, `down_payment`, `number_of_installments`, `installment_amount`, `interval_type`, `interval_value`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '3-Month Plan', '1500.00', '300.00', 3, '400.00', 'month', 1, 'Pay in 3 monthly installments with 300 GHS down payment', 1, '2025-12-27 00:48:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_installments`
-- Required by Payment-System/modules/installment_manager/installment_manager.php
--

CREATE TABLE `user_installments` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `plan_id` int(10) unsigned NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `remaining_amount` decimal(10,2) NOT NULL,
  `down_payment_paid` tinyint(1) DEFAULT 0,
  `status` enum('active','completed','defaulted','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `next_payment_date` date DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_user_installments_user` (`user_id`),
  KEY `idx_user_installments_plan` (`plan_id`),
  KEY `idx_user_installments_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installment_schedule`
--

CREATE TABLE `installment_schedule` (
  `id` int(10) UNSIGNED NOT NULL,
  `installment_id` int(10) UNSIGNED NOT NULL,
  `installment_number` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `paid_date` datetime DEFAULT NULL,
  `payment_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','paid','overdue','waived') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_paths`
--

CREATE TABLE `learning_paths` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficulty` enum('Beginner','Intermediate','Advanced') COLLATE utf8mb4_unicode_ci DEFAULT 'Beginner',
  `estimated_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_paths`
--

INSERT INTO `learning_paths` (`id`, `title`, `description`, `difficulty`, `estimated_time`, `thumbnail`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Full Stack Web Developer', 'Master both frontend and backend development', 'Intermediate', '6 months', NULL, 1, '2025-12-27 11:40:54', '2025-12-27 11:40:54'),
(2, 'Data Scientist', 'Learn data analysis, visualization, and machine learning', 'Advanced', '4 months', NULL, 1, '2025-12-27 11:40:54', '2025-12-27 11:40:54'),
(3, 'Mobile App Developer', 'Build native and cross-platform mobile applications', 'Intermediate', '5 months', NULL, 1, '2025-12-27 11:40:54', '2025-12-27 11:40:54'),
(4, 'Digital Marketing Expert', 'Master SEO, social media, and content marketing', 'Beginner', '3 months', NULL, 1, '2025-12-27 11:40:54', '2025-12-27 11:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `learning_path_courses`
--

CREATE TABLE `learning_path_courses` (
  `id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `order_position` int(11) NOT NULL,
  `is_required` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_path_courses`
--

INSERT INTO `learning_path_courses` (`id`, `path_id`, `course_id`, `order_position`, `is_required`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 2, 1),
(3, 1, 3, 3, 1),
(4, 2, 1, 1, 1),
(5, 2, 2, 2, 1),
(6, 3, 1, 1, 1),
(7, 4, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_learning_paths`
-- Used by LMS learning-path enrollment and listing pages.
--

CREATE TABLE `user_learning_paths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `status` enum('active','completed','paused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_user_learning_path` (`user_id`,`path_id`),
  KEY `idx_user_learning_paths_path` (`path_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_notes`
--

CREATE TABLE `lesson_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `note_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_timestamp` int(11) DEFAULT NULL COMMENT 'Timestamp in seconds',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_progress`
--

CREATE TABLE `lesson_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `status` enum('not_started','in_progress','completed') COLLATE utf8mb4_unicode_ci DEFAULT 'not_started',
  `progress_percentage` decimal(5,2) DEFAULT 0.00,
  `time_spent` int(11) DEFAULT 0 COMMENT 'Time in seconds',
  `last_position` int(11) DEFAULT 0 COMMENT 'Video position in seconds',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_questions`
--

CREATE TABLE `lesson_questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upvotes` int(11) DEFAULT 0,
  `is_answered` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_resources`
--

CREATE TABLE `lesson_resources` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `download_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_resources`
--

INSERT INTO `lesson_resources` (`id`, `lesson_id`, `title`, `file_name`, `file_path`, `file_type`, `file_size`, `download_count`, `created_at`) VALUES
(1, 1, 'Lesson Slides.pdf', 'web-dev-intro-slides.pdf', 'upload/resources/web-dev-intro-slides.pdf', 'PDF', 2048000, 0, '2025-12-27 01:56:23'),
(2, 1, 'Source Code.zip', 'lesson-1-code.zip', 'upload/resources/lesson-1-code.zip', 'ZIP', 512000, 0, '2025-12-27 01:56:23'),
(3, 3, 'Exercise Files.zip', 'first-webpage-exercise.zip', 'upload/resources/first-webpage-exercise.zip', 'ZIP', 256000, 0, '2025-12-27 01:56:23'),
(4, 1, 'Lesson Slides.pdf', 'web-dev-intro-slides.pdf', 'upload/resources/web-dev-intro-slides.pdf', 'PDF', 2048000, 0, '2025-12-27 02:03:24'),
(5, 1, 'Source Code.zip', 'lesson-1-code.zip', 'upload/resources/lesson-1-code.zip', 'ZIP', 512000, 0, '2025-12-27 02:03:24'),
(6, 3, 'Exercise Files.zip', 'first-webpage-exercise.zip', 'upload/resources/first-webpage-exercise.zip', 'ZIP', 256000, 0, '2025-12-27 02:03:24'),
(7, 1, 'Lesson Slides.pdf', 'web-dev-intro-slides.pdf', 'upload/resources/web-dev-intro-slides.pdf', 'PDF', 2048000, 0, '2025-12-27 12:04:07'),
(8, 1, 'Source Code.zip', 'lesson-1-code.zip', 'upload/resources/lesson-1-code.zip', 'ZIP', 512000, 0, '2025-12-27 12:04:07'),
(9, 3, 'Exercise Files.zip', 'first-webpage-exercise.zip', 'upload/resources/first-webpage-exercise.zip', 'ZIP', 256000, 0, '2025-12-27 12:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `success` tinyint(1) DEFAULT NULL,
  `attempt_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note_tags`
--

CREATE TABLE `note_tags` (
  `note_id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_tags`
--

INSERT INTO `note_tags` (`note_id`, `tag`) VALUES
(1, 'basics'),
(1, 'syntax'),
(1, 'variables'),
(2, 'css'),
(2, 'html'),
(2, 'responsive'),
(3, 'functions'),
(3, 'javascript'),
(3, 'scope'),
(4, 'data-structures'),
(4, 'python'),
(5, 'algorithms'),
(5, 'classification'),
(5, 'ml'),
(6, 'database'),
(6, 'design'),
(6, 'normalization');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'USD',
  `status` enum('pending','paid','failed','refunded','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `payment_gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment_meta`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_hash` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `used_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_type` enum('course_enrollment','installment','scholarship','other') COLLATE utf8mb4_unicode_ci DEFAULT 'course_enrollment',
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `tax` decimal(10,2) DEFAULT 0.00,
  `final_amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'GHS',
  `status` enum('pending','paid','failed','refunded','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `gateway_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gateway_response`)),
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installment_id` int(10) UNSIGNED DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `refunded_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `course_id`, `payment_type`, `gateway`, `payment_reference`, `invoice_number`, `amount`, `discount`, `tax`, `final_amount`, `currency`, `status`, `items`, `gateway_response`, `notes`, `installment_id`, `paid_at`, `refunded_at`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 'course_enrollment', 'Paystack', NULL, 'INV-20251227-F78A6EA0', '1800.00', '0.00', '0.00', '1800.00', 'GHS', 'failed', '[{\"description\":\"Course Enrollment\",\"quantity\":1,\"unit_price\":1800,\"total\":1800}]', NULL, 'Invalid key', NULL, NULL, NULL, '2025-12-27 00:57:45', '2025-12-27 00:57:46'),
(2, 9, 2, 'course_enrollment', 'Paystack', NULL, 'INV-20251227-E9A42431', '1800.00', '0.00', '0.00', '1800.00', 'GHS', 'failed', '[{\"description\":\"Course Enrollment\",\"quantity\":1,\"unit_price\":1800,\"total\":1800}]', NULL, 'Invalid key', NULL, NULL, NULL, '2025-12-27 00:59:29', '2025-12-27 00:59:30'),
(3, 9, 2, 'course_enrollment', 'Paystack', NULL, 'INV-20251227-AC3418D9', '1800.00', '0.00', '0.00', '1800.00', 'GHS', 'failed', '[{\"description\":\"Course Enrollment\",\"quantity\":1,\"unit_price\":1800,\"total\":1800}]', NULL, 'Invalid key', NULL, NULL, NULL, '2025-12-27 00:59:36', '2025-12-27 00:59:37'),
(4, 9, 2, 'course_enrollment', 'Paystack', 'DEMO_PAY_4_1766797465', 'INV-20251227-DB1D411B', '1800.00', '0.00', '0.00', '1800.00', 'GHS', 'paid', '[{\"description\":\"Course Enrollment\",\"quantity\":1,\"unit_price\":1800,\"total\":1800}]', NULL, NULL, NULL, '2025-12-27 01:04:25', NULL, '2025-12-27 01:04:25', '2025-12-27 01:04:25'),
(5, 9, 2, 'course_enrollment', 'Paystack', 'DEMO_PAY_5_1766797533', 'INV-20251227-AB840ABB', '1800.00', '0.00', '0.00', '1800.00', 'GHS', 'paid', '[{\"description\":\"Course Enrollment\",\"quantity\":1,\"unit_price\":1800,\"total\":1800}]', NULL, NULL, NULL, '2025-12-27 01:05:33', NULL, '2025-12-27 01:05:33', '2025-12-27 01:05:33'),
(6, 9, 1, 'course_enrollment', 'Paystack', 'DEMO_PAY_6_1766797708', 'INV-20251227-E3D80A98', '1500.00', '0.00', '0.00', '1500.00', 'GHS', 'paid', '[{\"description\":\"Course Enrollment\",\"quantity\":1,\"unit_price\":1500,\"total\":1500}]', NULL, NULL, NULL, '2025-12-27 01:08:28', NULL, '2025-12-27 01:08:28', '2025-12-27 01:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `event_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`request_data`)),
  `response_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response_data`)),
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_subscriptions`
--

CREATE TABLE `payment_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `plan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'GHS',
  `interval` enum('monthly','quarterly','annually') COLLATE utf8mb4_unicode_ci DEFAULT 'monthly',
  `status` enum('active','cancelled','expired','past_due') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `current_period_start` date DEFAULT NULL,
  `current_period_end` date DEFAULT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_instructor_answer` tinyint(1) DEFAULT 0,
  `upvotes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `refund_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','completed','failed') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `processed_by` int(10) UNSIGNED DEFAULT NULL,
  `gateway_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gateway_response`)),
  `refunded_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_downloads`
--

CREATE TABLE `resource_downloads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `resource_type` enum('E-Book','Whitepaper','Research Paper','Guide','Template','Other') DEFAULT 'Other',
  `category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_format` varchar(20) DEFAULT NULL,
  `file_size` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT 0.00,
  `downloads` int(11) DEFAULT 0,
  `uploaded_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource_downloads`
--

INSERT INTO `resource_downloads` (`id`, `title`, `resource_type`, `category`, `description`, `file_format`, `file_size`, `file_path`, `pages`, `rating`, `downloads`, `uploaded_date`, `created_at`, `updated_at`) VALUES
(1, 'Python Programming E-Book', 'E-Book', 'Programming', 'Comprehensive Python programming guide from basics to advanced', 'PDF', '5.2 MB', 'python-ebook.pdf', 450, '4.80', 3400, '2024-02-15', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(2, 'AI Whitepaper 2024', 'Whitepaper', 'AI & ML', 'Latest trends and developments in artificial intelligence', 'PDF', '2.8 MB', 'ai-whitepaper.pdf', 85, '4.70', 2100, '2024-02-12', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(3, 'Machine Learning Research Paper', 'Research Paper', 'AI & ML', 'Advanced machine learning algorithms and applications', 'PDF', '3.5 MB', 'ml-research.pdf', 120, '4.90', 1800, '2024-02-10', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(4, 'Web Development Guide', 'E-Book', 'Web Development', 'Complete guide to modern web development technologies', 'PDF', '4.8 MB', 'web-dev-guide.pdf', 380, '4.60', 4200, '2024-02-08', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(5, 'Data Science Handbook', 'E-Book', 'Data Science', 'Essential data science concepts and practical applications', 'PDF', '6.1 MB', 'data-science-handbook.pdf', 520, '4.80', 3900, '2024-02-05', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(6, 'Cybersecurity Framework', 'Guide', 'Security', 'Comprehensive security framework and implementation guide', 'PDF', '3.2 MB', 'security-framework.pdf', 200, '4.70', 2600, '2024-02-01', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(7, 'Python Programming E-Book', 'E-Book', 'Programming', 'Comprehensive Python programming guide from basics to advanced', 'PDF', '5.2 MB', 'python-ebook.pdf', 450, '4.80', 3400, '2024-02-15', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(8, 'AI Whitepaper 2024', 'Whitepaper', 'AI & ML', 'Latest trends and developments in artificial intelligence', 'PDF', '2.8 MB', 'ai-whitepaper.pdf', 85, '4.70', 2100, '2024-02-12', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(9, 'Machine Learning Research Paper', 'Research Paper', 'AI & ML', 'Advanced machine learning algorithms and applications', 'PDF', '3.5 MB', 'ml-research.pdf', 120, '4.90', 1800, '2024-02-10', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(10, 'Web Development Guide', 'E-Book', 'Web Development', 'Complete guide to modern web development technologies', 'PDF', '4.8 MB', 'web-dev-guide.pdf', 380, '4.60', 4200, '2024-02-08', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(11, 'Data Science Handbook', 'E-Book', 'Data Science', 'Essential data science concepts and practical applications', 'PDF', '6.1 MB', 'data-science-handbook.pdf', 520, '4.80', 3900, '2024-02-05', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(12, 'Cybersecurity Framework', 'Guide', 'Security', 'Comprehensive security framework and implementation guide', 'PDF', '3.2 MB', 'security-framework.pdf', 200, '4.70', 2600, '2024-02-01', '2025-12-27 12:27:12', '2025-12-27 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `resource_videos`
--

CREATE TABLE `resource_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `instructor_name` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `quality` varchar(20) DEFAULT NULL,
  `file_size` varchar(50) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `uploaded_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource_videos`
--

INSERT INTO `resource_videos` (`id`, `title`, `course_name`, `category`, `instructor_name`, `duration`, `thumbnail`, `video_path`, `quality`, `file_size`, `views`, `uploaded_date`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Programming - Full Course', 'Programming Fundamentals', 'Programming', 'Prof. John Smith', '2:45:30', NULL, NULL, '1080p', '1.2 GB', 15600, '2024-02-15', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(2, 'Web Development Basics - HTML & CSS', 'Web Development Bootcamp', 'Web Development', 'Sarah Johnson', '1:30:45', NULL, NULL, '1080p', '850 MB', 12400, '2024-02-12', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(3, 'JavaScript Advanced Concepts', 'JavaScript Mastery', 'Web Development', 'Mike Davis', '3:15:20', NULL, NULL, '4K', '2.5 GB', 18900, '2024-02-10', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(4, 'Python for Data Science', 'Data Science Complete', 'Data Science', 'Dr. Emily Chen', '2:20:15', NULL, NULL, '1080p', '1.5 GB', 21500, '2024-02-08', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(5, 'Machine Learning Fundamentals', 'AI & Machine Learning', 'AI & ML', 'Dr. Robert Fox', '4:10:30', NULL, NULL, '4K', '3.8 GB', 25300, '2024-02-05', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(6, 'React.js Complete Tutorial', 'Modern Frontend Development', 'Web Development', 'Alex Thompson', '3:45:00', NULL, NULL, '1080p', '2.1 GB', 19800, '2024-02-01', '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(7, 'Introduction to Programming - Full Course', 'Programming Fundamentals', 'Programming', 'Prof. John Smith', '2:45:30', NULL, NULL, '1080p', '1.2 GB', 15600, '2024-02-15', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(8, 'Web Development Basics - HTML & CSS', 'Web Development Bootcamp', 'Web Development', 'Sarah Johnson', '1:30:45', NULL, NULL, '1080p', '850 MB', 12400, '2024-02-12', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(9, 'JavaScript Advanced Concepts', 'JavaScript Mastery', 'Web Development', 'Mike Davis', '3:15:20', NULL, NULL, '4K', '2.5 GB', 18900, '2024-02-10', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(10, 'Python for Data Science', 'Data Science Complete', 'Data Science', 'Dr. Emily Chen', '2:20:15', NULL, NULL, '1080p', '1.5 GB', 21500, '2024-02-08', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(11, 'Machine Learning Fundamentals', 'AI & Machine Learning', 'AI & ML', 'Dr. Robert Fox', '4:10:30', NULL, NULL, '4K', '3.8 GB', 25300, '2024-02-05', '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(12, 'React.js Complete Tutorial', 'Modern Frontend Development', 'Web Development', 'Alex Thompson', '3:45:00', NULL, NULL, '1080p', '2.1 GB', 19800, '2024-02-01', '2025-12-27 12:27:12', '2025-12-27 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL CHECK (`rating` >= 0 and `rating` <= 5),
  `review_text` text DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saved_courses`
--

CREATE TABLE `saved_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_courses`
--

INSERT INTO `saved_courses` (`id`, `user_id`, `course_id`, `saved_at`) VALUES
(1, 1, 1, '2024-12-20 10:30:00'),
(2, 1, 2, '2024-12-22 14:15:00'),
(3, 1, 3, '2024-12-25 09:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('percentage','fixed','full') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `max_awards` int(11) NOT NULL,
  `available_slots` int(11) NOT NULL,
  `eligibility_criteria` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`eligibility_criteria`)),
  `requirements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`requirements`)),
  `application_deadline` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `name`, `description`, `type`, `discount_percentage`, `discount_amount`, `max_awards`, `available_slots`, `eligibility_criteria`, `requirements`, `application_deadline`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Merit Scholarship 2025', 'For students with excellent academic records', 'percentage', '50.00', NULL, 20, 20, NULL, NULL, '2025-03-31', '2025-01-01', '2025-12-31', 1, '2025-12-27 00:48:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_applications`
--

CREATE TABLE `scholarship_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `scholarship_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `personal_statement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`academic_info`)),
  `financial_need` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`achievements`)),
  `references` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`references`)),
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents`)),
  `status` enum('pending','under_review','approved','rejected','waitlist') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `reviewer_id` int(10) UNSIGNED DEFAULT NULL,
  `review_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL,
  `applied_date` datetime NOT NULL,
  `reviewed_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_awards`
--

CREATE TABLE `scholarship_awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `application_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `scholarship_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `original_amount` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `final_amount` decimal(10,2) NOT NULL,
  `award_date` datetime NOT NULL,
  `valid_until` date NOT NULL,
  `status` enum('active','expired','revoked') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_notes`
--

CREATE TABLE `study_notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `note_date` date DEFAULT NULL,
  `word_count` int(11) DEFAULT NULL,
  `is_favorite` tinyint(1) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `study_notes`
--

INSERT INTO `study_notes` (`id`, `title`, `course_name`, `category`, `content`, `note_date`, `word_count`, `is_favorite`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Programming - Lecture 1', 'Programming Fundamentals', 'Programming', 'Key concepts: Variables, Data Types, Control Structures...', '2024-02-15', 850, 1, NULL, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(2, 'Web Development - HTML & CSS Basics', 'Web Development Bootcamp', 'Web Development', 'HTML structure, CSS styling, responsive design principles...', '2024-02-14', 1200, 0, NULL, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(3, 'JavaScript Functions and Scope', 'JavaScript Mastery', 'Programming', 'Function declarations, arrow functions, closures, scope chain...', '2024-02-13', 950, 1, NULL, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(4, 'Python Data Structures', 'Data Science with Python', 'Data Science', 'Lists, tuples, dictionaries, sets, and their operations...', '2024-02-12', 1100, 0, NULL, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(5, 'Machine Learning Algorithms Overview', 'Introduction to ML', 'AI & ML', 'Supervised vs unsupervised learning, common algorithms...', '2024-02-11', 1350, 1, NULL, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(6, 'Database Normalization Concepts', 'Database Management', 'Database', 'Normal forms, functional dependencies, database design...', '2024-02-10', 880, 0, NULL, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(7, 'Introduction to Programming - Lecture 1', 'Programming Fundamentals', 'Programming', 'Key concepts: Variables, Data Types, Control Structures...', '2024-02-15', 850, 1, NULL, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(8, 'Web Development - HTML & CSS Basics', 'Web Development Bootcamp', 'Web Development', 'HTML structure, CSS styling, responsive design principles...', '2024-02-14', 1200, 0, NULL, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(9, 'JavaScript Functions and Scope', 'JavaScript Mastery', 'Programming', 'Function declarations, arrow functions, closures, scope chain...', '2024-02-13', 950, 1, NULL, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(10, 'Python Data Structures', 'Data Science with Python', 'Data Science', 'Lists, tuples, dictionaries, sets, and their operations...', '2024-02-12', 1100, 0, NULL, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(11, 'Machine Learning Algorithms Overview', 'Introduction to ML', 'AI & ML', 'Supervised vs unsupervised learning, common algorithms...', '2024-02-11', 1350, 1, NULL, '2025-12-27 12:27:12', '2025-12-27 12:27:12'),
(12, 'Database Normalization Concepts', 'Database Management', 'Database', 'Normal forms, functional dependencies, database design...', '2024-02-10', 880, 0, NULL, '2025-12-27 12:27:12', '2025-12-27 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','past_due','cancelled','trialing','expired') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `started_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ends_at` timestamp NULL DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `domain` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'messages',
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `difficulty_level` enum('Beginner','Intermediate','Advanced') DEFAULT 'Beginner',
  `instructor_id` int(11) DEFAULT NULL,
  `instructor_name` varchar(100) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT 0.00,
  `students_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `description`, `category`, `image`, `duration`, `difficulty_level`, `instructor_id`, `instructor_name`, `rating`, `students_count`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Python', 'Learn the basics of Python programming, including variables, data types, loops, and functions.', 'Programming', NULL, '2h 30m', 'Beginner', NULL, 'John Doe', '4.50', 1250, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(2, 'Getting Started with Web Development', 'Learn how to build a website using HTML, CSS, and JavaScript, with a focus on modern web development best practices.', 'Web Development', NULL, '3h 15m', 'Beginner', NULL, 'Jane Smith', '4.80', 2100, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(3, 'Data Science Fundamentals', 'Learn the basics of data science, including data visualization, statistical analysis, and machine learning.', 'Data Science', NULL, '4h 00m', 'Intermediate', NULL, 'Mike Johnson', '4.70', 890, '2025-12-27 12:19:21', '2025-12-27 12:19:21'),
(4, 'Advanced JavaScript Concepts', 'Master advanced JavaScript topics including closures, promises, async/await, and ES6+ features.', 'Programming', NULL, '5h 20m', 'Advanced', NULL, 'Sarah Williams', '4.90', 1560, '2025-12-27 12:19:21', '2025-12-27 12:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('admin','instructor','student') NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `role`, `status`, `created_at`) VALUES
(1, 'admin', 'admin@techworldacademy.local', '$2y$10$RIFpHF5VsW84LRcq1gUZnOBPdzSFeFM4Vwtjnq.zarkFL8VdXCVOC', 'TECHWORLD Administrator', NULL, 'admin', 'active', '2026-09-28 21:31:47'),
(2, 'Ama', 'ama@gmail.com', '$2y$10$boclaEcbWF.m5NjDSruXwe5F4h1Ku5FnQI6GZIre91IOvBhrGsI0a', 'Amakofi', NULL, 'student', 'active', '2026-09-29 04:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL,
  `awarded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_resource_access`
-- Read by the LMS library page to display resource history.
--

CREATE TABLE `user_resource_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `resource_type` varchar(50) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `accessed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_user_resource_access_user` (`user_id`),
  KEY `idx_user_resource_access_resource` (`resource_type`,`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_password_reset_token_hash` (`token_hash`),
  ADD KEY `idx_password_reset_user_expiry` (`user_id`,`expires_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_users_username` (`username`),
  ADD UNIQUE KEY `uq_users_email` (`email`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_installments`
--
ALTER TABLE `user_installments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

-- Ensure entity tables have generated identifiers and junction tables reject duplicate links.
ALTER TABLE `activity` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `api_keys` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `articles` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `assignments` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `assignment_submissions` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `audit_logs` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `badges` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `categories` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `certificates` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `coupons` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `courses` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `course_lessons` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `course_modules` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `course_reviews` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `course_views` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `documents` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `ebooks` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `enrollments` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `files` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `installment_plans` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `installment_schedule` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `learning_paths` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `learning_path_courses` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `lesson_notes` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `lesson_progress` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `lesson_questions` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `lesson_resources` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `login_attempts` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `messages` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `notifications` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `orders` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `order_items` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `payments` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `payment_logs` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `payment_subscriptions` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `question_answers` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `refunds` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `resource_downloads` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `resource_videos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `reviews` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `saved_courses` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `scholarships` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `scholarship_applications` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `scholarship_awards` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `study_notes` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `subscriptions` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `tags` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `translations` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `tutorials` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);
ALTER TABLE `article_tags` ADD PRIMARY KEY (`article_id`, `tag`);
ALTER TABLE `course_tags` ADD PRIMARY KEY (`course_id`, `tag`);
ALTER TABLE `note_tags` ADD PRIMARY KEY (`note_id`, `tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
