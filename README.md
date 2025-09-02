# CampusSpeak - Online Student Complaint & Feedback System
## A project by Group 1

## Project Overview
**CampusSpeak** is a web-based platform designed to empower college students to report issues and provide feedback to their institution, ensuring their voices are heard. Built with **Laravel** and **Blade** templating, styled with **Bootstrap**, it offers a user-friendly interface for submitting complaints (e.g., academic, facility, bullying) with an optional anonymous mode for sensitive issues. The system includes an admin dashboard for school staff to review and respond to submissions, with ticket tracking to keep students informed of their complaint status. CampusSpeak fosters transparent communication between students and administration, enhancing campus life.

## Features
- **User Roles**:
  - **Students**: Submit complaints/feedback, view ticket status, and opt for anonymity.
  - **Admins**: Manage and respond to complaints via a dedicated dashboard.
- **Complaint Submission**:
  - Submit issues categorized as academic, facility, bullying, or other.
  - Optional anonymous submission for sensitive concerns.
  - Form validation to ensure complete and valid submissions.
- **Ticket Tracking**:
  - Students track complaint status (e.g., Pending, In Progress, Resolved) via a personal dashboard.
  - Unique ticket IDs for easy reference.
- **Admin Dashboard**:
  - View, categorize, and respond to complaints.
  - Filter complaints by status, category, or date.
  - Log responses and update ticket statuses.
- **Notifications**:
  - Email or in-app alerts for submission confirmation, status updates, and admin responses.
- **Responsive UI**:
  - Bootstrap-powered layouts for seamless use on mobile and desktop.
- **Security**:
  - Authentication via school email/student ID.
  - Anonymity preserved for sensitive submissions using secure backend logic.

## Tech Stack
- **Backend**: Laravel 11.x (PHP framework for robust logic and routing)
- **Frontend**: Blade templating (dynamic UI) + Bootstrap 5.x (responsive styling)
- **Database**: MySQL (for storing users, complaints, and responses)
- **Additional Tools**:
  - Laravel Authentication (Sanctum for secure API tokens if needed)
  - Laravel Notifications (for email/in-app alerts)
  - Laravel Eloquent (for database interactions)
  - Composer (dependency management)
  - NPM (for managing Bootstrap and frontend assets)

## Prerequisites
- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL or compatible database
- Web server (e.g., Apache, Nginx, or Laravel’s Artisan serve for development)
- Git (for cloning the repository)

## Installation
1. **Clone the Repository**:
   ```bash
   git clone [https://github.com/your-repo/campus-speak.git](https://github.com/KodiakBEAR3277/campus-speak.git)
   cd campus-speak

2. **Install Dependencies**:
   ```bash
   git clone [https://github.com/your-repo/campus-speak.git](https://github.com/KodiakBEAR3277/campus-speak.git)
   cd campus-speak

3. **Copy Environment**:
    - Copy .env.example to .env:
        ```bash
        cp .env.example .env
    - Update .env with your database credentials and mail settings:
        - DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD for your MySQL database.
        - MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD for your email service (e.g., SMTP provider).



4. **CGenerate Application Key**:
   ```bash
   php artisan key:generate

5. **Run Migrations**:
   ```bash
   php artisan migrate

6. **Compile Frontend Assets**:
   ```bash
   npm run dev

7. **Start the Development Server**:
   ```bash
   php artisan serve

##### - Access the app at http://localhost:8000.


