<a name="readme-top">

<br/>

<br />
<div align="center">
  <a href="https://github.com/zyx-0314/">
    <img src="/assets/img/travelez-green.png" alt="GabCamino" height="100">
  </a>
  <h3 align="center">AD Task 3</h3>
</div>
<div align="center">
  TravelEZ is a user-friendly website that provides a comprehensive timetable of bus routes across the Philippines. Whether you're planning a trip from Manila to North Luzon or other key destinations, TravelEZ helps you explore available routes offered by various bus companies.
</div>

<br />

![](https://visit-counter.vercel.app/counter.png?page=gabbycam98/AD-Activity-3)

[![wakatime](https://wakatime.com/badge/user/018dd99a-4985-4f98-8216-6ca6fe2ce0f8/project/63501637-9a31-42f0-960d-4d0ab47977f8.svg)](https://wakatime.com/badge/user/018dd99a-4985-4f98-8216-6ca6fe2ce0f8/project/63501637-9a31-42f0-960d-4d0ab47977f8)

---

<br />
<br />

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li>
          <a href="#key-components">Key Components</a>
        </li>
        <li>
          <a href="#technology">Technology</a>
        </li>
      </ol>
    </li>
    <li>
      <a href="#rule,-practices-and-principles">Rules, Practices and Principles</a>
    </li>
    <li>
      <a href="#resources">Resources</a>
    </li>
  </ol>
</details>

---

## Overview

## Overview

**TravelEZ** is a comprehensive web application that revolutionizes bus travel planning in the Philippines through an intuitive digital platform. Built with modern web development principles, it seamlessly integrates `back-end development`, `database management`, and `front-end development` to deliver a robust user experience.

The platform empowers users to `create secure accounts`, `authenticate safely`, and access `real-time bus timetables` featuring major Philippine bus operators including Victory Liner, Genesis Transport Service, and Partas Trans. With `role-based access control` and `responsive design`, TravelEZ caters to both regular travelers and administrative users while maintaining optimal performance across all devices.

**Core Functionality:**

- **Real-Time Scheduling**: Live bus departure times with dynamic status indicators (Scheduled, Boarding, Departed)
- **Route Coverage**: Comprehensive routes covering Manila to North Luzon and key destinations nationwide
- **User Management**: Secure registration, authentication, and session handling with admin privileges
- **Responsive Interface**: Mobile-first design ensuring seamless experience across desktop, tablet, and mobile devices
- **Future Booking System**: Infrastructure ready for upcoming online ticket booking capabilities

**Technical Excellence:**
TravelEZ showcases professional-grade development practices through its MVC architecture, dual-database integration (PostgreSQL & MongoDB), automated database management via Composer scripts, and component-based design pattern. The application emphasizes security through password hashing, input validation, and proper session management while maintaining code quality through organized file structures and comprehensive documentation.

Whether you're a daily commuter planning your route or a traveler exploring the Philippines, TravelEZ provides the reliable, up-to-date information you need to make informed travel decisions.

### Key Components

- **Responsive Front-end Design**: A clean and intuitive user interface built with modern CSS, featuring a responsive navigation system, interactive elements, and a consistent visual design that adapts to different screen sizes and user authentication states.

- **PostgreSQL & MongoDB Database Integration**: A robust dual-database architecture utilizing PostgreSQL for user management and authentication data, with MongoDB for additional data storage, ensuring scalable and efficient data management with automated connection checking.

- **PHP MVC Architecture**: A well-structured back-end implementation using PHP with a Model-View-Controller pattern, featuring organized handlers for authentication and user actions, utility classes for database operations, and reusable components for consistent page layouts.

- **User Authentication System**: A comprehensive login and registration system with session management, role-based access control (admin/user), password hashing, and secure user data handling with proper validation and error messaging.

- **Live Bus Timetable System**: A dynamic timetable display showing real-time bus schedules across Philippines routes, with trip status indicators (Scheduled, Boarding, Departed) and route information from multiple bus companies including Victory Liner, Genesis Transport, and Partas Trans.

- **Automated Database Management**: Built-in database utilities for automated table creation, data seeding, migration, and reset operations using Composer scripts, streamlining development and deployment processes.

### Technology

#### Language

![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

#### Framework/Library

![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

#### Databases

![MongoDB](https://img.shields.io/badge/MongoDB-47A248?style=for-the-badge&logo=mongodb&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white)

## Rules, Practices and Principles

<!-- Do not Change this -->

1. Always use `AD-` in the front of the Title of the Project for the Subject followed by your custom naming.
2. Do not rename `.php` files if they are pages; always use `index.php` as the filename.
3. Add `.component` to the `.php` files if they are components code; example: `footer.component.php`.
4. Add `.util` to the `.php` files if they are utility codes; example: `account.util.php`.
5. Place Files in their respective folders.
6. Different file naming Cases
   | Naming Case | Type of code | Example |
   | ----------- | -------------------- | --------------------------------- |
   | Pascal | Utility | Accoun.util.php |
   | Camel | Components and Pages | index.php or footer.component.php |
7. Renaming of Pages folder names are a must, and relates to what it is doing or data it holding.
8. Use proper label in your github commits: `feat`, `fix`, `refactor` and `docs`
9. File Structure to follow below.

```
AD-ProjectName
└─ assets
|   └─ css
|   |   └─ name.css
|   └─ img
|   |   └─ name.jpeg/.jpg/.webp/.png
|   └─ js
|       └─ name.js
└─ components
|   └─ name.component.php
|   └─ templates
|      └─ name.component.php
└─ handlers
|   └─ name.handler.php
└─ layout
|   └─ name.layout.php
└─ pages
|  └─ pageName
|     └─ assets
|     |  └─ css
|     |  |  └─ name.css
|     |  └─ img
|     |  |  └─ name.jpeg/.jpg/.webp/.png
|     |  └─ js
|     |     └─ name.js
|     └─ index.php
└─ staticData
|  └─ name.staticdata.php
└─ utils
|   └─ name.utils.php
└─ vendor
└─ .gitignore
└─ bootstrap.php
└─ composer.json
└─ composer.lock
└─ index.php
└─ readme.md
└─ router.php
```

> The following should be renamed: name.css, name.js, name.jpeg/.jpg/.webp/.png, name.component.php(but not the part of the `component.php`), Name.utils.php(but not the part of the `utils.php`)

## Resources

| Title               | Purpose                                          | Link          |
| ------------------- | ------------------------------------------------ | ------------- |
| Github CoPilot Chat | Proper code structure, troubleshooting, and tips |               |
| w3schools           | Css design improvement                           | w3schools.com |
