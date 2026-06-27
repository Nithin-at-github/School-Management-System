# School Management System (SMS)

A complete, role-based School Management System built with PHP and MySQL. The project is designed with a responsive dashboard interface catering to four distinct user roles: **Administrators**, **Teachers**, **Students**, and **Parents**.

This application is fully containerized using **Docker** and **Docker Compose**, allowing for isolated, zero-configuration local execution.

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


## 📸 Screenshots

<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-35-41" src="https://github.com/user-attachments/assets/4599bd4d-8dfc-46f2-b78d-39ffe4ef8a82" />


### 🛡️ Administrator Dashboard
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-38-12" src="https://github.com/user-attachments/assets/40407ac0-a630-4ddb-a178-882925db775c" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-39-09" src="https://github.com/user-attachments/assets/807c2c61-e959-4776-954a-47564e2a78ba" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-39-49" src="https://github.com/user-attachments/assets/3046dccc-162b-46df-a822-2cf0a58bc144" />


### 👨‍🏫 Teacher Dashboard
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-40-50" src="https://github.com/user-attachments/assets/19118043-c3c3-4b20-9710-6b605e09a5ac" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-41-25" src="https://github.com/user-attachments/assets/280dd2e5-ed85-4803-a3e9-321dbded6fc9" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-41-44" src="https://github.com/user-attachments/assets/779a068a-edbd-4b5b-adde-0191b7d8278c" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-41-52" src="https://github.com/user-attachments/assets/f95dc564-977e-48eb-9f31-7dab9182a57e" />


### 🎓 Student Portal & Online Examination
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-42-24" src="https://github.com/user-attachments/assets/38902815-4723-4274-a75e-6503f71e94b3" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-42-39" src="https://github.com/user-attachments/assets/1e73686f-93c5-4233-abab-533a965e0b5a" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-42-53" src="https://github.com/user-attachments/assets/4f073648-4705-4680-ab4c-7ad0b4ab1fce" />


### 👪 Parent Portal
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-44-12" src="https://github.com/user-attachments/assets/450ed388-127b-49d1-aea8-1ab90f23bc6f" />
<img width="1920" height="1200" alt="Screenshot from 2026-06-27 13-44-25" src="https://github.com/user-attachments/assets/1499b561-f2cc-401b-9b5d-6aadb95d3d49" />


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
