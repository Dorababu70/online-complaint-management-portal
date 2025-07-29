CREATE DATABASE IF NOT EXISTS complaint_portal;
USE complaint_portal;

-- Users Table (for both admins and users)
CREATE TABLE users (
    userid INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

-- Complaints/Work Table
CREATE TABLE tblwork (
    WorkID INT AUTO_INCREMENT PRIMARY KEY,
    WorkerNo VARCHAR(50) NOT NULL,
    WorkerName VARCHAR(50) NOT NULL,
    WorkDetails TEXT NOT NULL,
    SubmissionDate DATE NOT NULL
);

-- Teams Table
CREATE TABLE tblteam (
    TeamNo INT AUTO_INCREMENT PRIMARY KEY,
    TeamName VARCHAR(50) NOT NULL,
    ProjectDetails VARCHAR(255) NOT NULL,
    DueDate DATE NOT NULL
);

-- Feedback Table
CREATE TABLE tblfeedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    projectcode VARCHAR(50) NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comments TEXT,
    submission_date DATETIME NOT NULL
);
