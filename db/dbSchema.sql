-- db name
CREATE DATABASE IF NOT EXISTS kowd_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kowd_db;

-- User table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) UNIQUE NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    university VARCHAR(100) NOT NULL,
    institution VARCHAR(100) NOT NULL,
    role ENUM('admin', 'moderator', 'member', 'student', 'other') DEFAULT 'member',
    profile_avatar VARCHAR(255) DEFAULT 'default.png',
    bio TEXT,
    reputation INT DEFAULT 0,
    status ENUM('active', 'busy', 'on-meteting', 'offline', 'banned', 'pending') DEFAULT 'active',
    email_verifid BOOLEAN DEFAULT FALSE,
    email_verification_token VARCHAR(255),
    password_reset_token VARCHAR(255),
    password_reset_expires TIMESTAMP NULL,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_username (username),
    INDEX idx_email (email),
    INDEX idx_university (university),
    INDEX idx_role (role),
    INDEX idx_status (status)
);

CREATE TABLE user_progress (
    progress_id INT PRIMARY KEY,
    user_id INT,
    lesson_id INT,
    completed BOOLEAN,
    
)

-- Login attempts
CREATE TABLE login_attempts (
    id INT(11) UNSIGNRF AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    attempted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    KEY idx_username (username),
    KEY idx_ip_address (ip_address),
    KEY idx_attempted_at (attempted_at)
)

-- 
CREATE TABLE programming_language (

)