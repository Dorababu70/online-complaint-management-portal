# Online Complaint Management / Feedback Portal

## 📌 Project Overview

This web-based portal allows users to register, log in, and submit complaints and feedback related to their assigned projects or teams. Admin users can view, manage, and respond to submitted complaints and feedback while managing teams and project assignments.

## 🚀 Features

* User registration and login with session handling
* Role-based dashboards (Admin/User)
* Complaint submission and tracking
* Feedback submission with ratings and comments
* Team and project management (admin only)
* Admin panel for viewing all user complaints and feedback

## 🛠️ Technologies Used

* **Frontend:** HTML, CSS
* **Backend:** PHP
* **Database:** MySQL
* **Local Server:** XAMPP (Apache + MySQL)

## 🗂️ Project Structure

```
project-root/
├─ includes/
│   └─ dbconfig.php
├─ admin_dashboard.php
├─ add_complaint.php
├─ add_team.php
├─ feedback.php
├─ login.php
├─ logout.php
├─ my_complaints.php
├─ profile.php            (optional - user profile)
├─ register.php
├─ submit_complaint.php
├─ submit_feedback.php
├─ user_dashboard.php
├─ view_complaints.php
├─ view_feedback.php
├─ README.md
├─ .gitignore
└─ database/
    └─ complaint_portal.sql
```

## 🔧 Setup Instructions

1. Clone or download this repository to your local server directory (e.g., `htdocs` in XAMPP).
2. Start Apache and MySQL via XAMPP Control Panel.
3. Create a database named `vsmdb` (or your preferred name).
4. Import the SQL file located at `database/complaint_portal.sql` into your database.
5. Open `includes/dbconfig.php` and update the database credentials if needed.
6. Open a web browser and go to `http://localhost/register.php` to begin using the portal.

## 📝 Notes

* Ensure session management is properly configured in PHP.
* Default credentials or admin access should be changed before deployment.
* Future Enhancements:

  * Email notifications
  * Complaint status updates
  * Improved user interface
  * Admin reply/comment system

## 👥 Contributor

[Dorababu](https://github.com/Dorababu70)
