# School Management System (SMS)

A complete, role-based School Management System built with PHP and MySQL. The project is designed with a responsive dashboard interface catering to four distinct user roles: **Administrators**, **Teachers**, **Students**, and **Parents**.

This application is fully containerized using **Docker** and **Docker Compose**, allowing for isolated, zero-configuration local execution.

---

## 📸 Screenshots

> [!TIP]
> Add screenshots of your running dashboards here to showcase the system.

### 🛡️ Administrator Dashboard
*Add a screenshot showing the admin metrics cards (Total Students, Teachers, Parents, and Revenue).*
<!-- SCREENSHOT PLACEHOLDER: admin_dashboard.png -->
```
[Insert Screenshot: admin_dashboard.png]
```

### 👨‍🏫 Teacher Dashboard
*Add a screenshot showing the class management and attendance marking panel.*
<!-- SCREENSHOT PLACEHOLDER: teacher_dashboard.png -->
```
[Insert Screenshot: teacher_dashboard.png]
```

### 🎓 Student Portal & Online Examination
*Add a screenshot showing the active quiz/exam view or student class schedules.*
<!-- SCREENSHOT PLACEHOLDER: student_dashboard.png -->
```
[Insert Screenshot: student_dashboard.png]
```

### 👪 Parent Portal
*Add a screenshot showing the fee payment module or student performance tracker.*
<!-- SCREENSHOT PLACEHOLDER: parent_dashboard.png -->
```
[Insert Screenshot: parent_dashboard.png]
```

---

## ✨ Features by Role

### 1. 🛡️ Administrator Portal
*   **Analytics Dashboard**: Real-time counters showing total students, teachers, parents, and system revenue.
*   **Student Admissions**: Manage incoming student admission requests. Approve applications and automatically migrate them to active student records.
*   **Academic Setup**: Add teachers, assign classes and sections (e.g., Class X Section A).
*   **Financials & Payroll**: Track paid/due tuition fees by student/parent. Process and log teacher salaries.
*   **Examinations**: Create new quizzes, configure questions with multiple options, mark correct keys, and view detailed scores.
*   **System Communications**: Send public/global notifications and check complaints filed by parents, students, or staff.

### 2. 👨‍🏫 Teacher Portal
*   **Attendance Registry**: Mark morning and afternoon attendance for students in assigned classes.
*   **Virtual Classes**: Host live virtual classes by sharing dates, times, and meeting links (e.g., Google Meet).
*   **Leave Management**: Apply for leaves with custom durations and track their approval status.
*   **Performance Monitoring**: Track quiz scores and exam results of students.
*   **Inbox/Alerts**: Receive notifications and view messages directed from the administrator.

### 3. 🎓 Student Portal
*   **Live Classroom**: View daily online class schedules and join live meeting links.
*   **Attendance Log**: Track individual daily attendance history.
*   **Online Exams**: Take structured quizzes containing a countdown timer, with instant auto-grading upon submission.
*   **Report Cards**: View past test results, overall scores, and correct/incorrect answer breakdowns.

### 4. 👪 Parent Portal
*   **Admission Request**: Register new children online by submitting the parent admission form.
*   **Tuition Fees**: View term fees and securely pay tuition fees online.
*   **Performance Tracking**: Monitor child's test scores, class attendance, and progress.
*   **Feedback Channel**: File complaints or feedback directly with administrators and class teachers.

---

## 🚀 Getting Started (Docker Setup)

Run the application in seconds without installing local web servers or databases:

### 1. Start the Containers
In the project root directory, run:
```bash
docker compose up -d --build
```
This command builds the custom PHP container (installing the required `mysqli` extension) and launches a MySQL 8.0 instance, automatically importing the structural schema and seed data from `sms.sql`.

### 2. Access the Application
*   **Web Port**: [http://localhost:8080](http://localhost:8080)
*   **Database Port**: `localhost:3307`

### 3. Stop the Application
```bash
docker compose down
```

---

## 🔑 Login Credentials

The database comes pre-seeded with the following credentials (passwords are stored as secure BCrypt hashes):
refer to `details.txt`.

---

## 🛠️ Tech Stack
*   **Frontend**: HTML5, CSS, JavaScript, FontAwesome Icons.
*   **Backend**: Core PHP (Object-oriented & Procedural components).
*   **Database**: MySQL 8.0 (relational schema).
*   **Deployment**: Docker & Docker Compose.
