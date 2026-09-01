# 🎓 Sistema Integrado de Matrícula - UNS

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![React](https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

Plataforma institucional para la administración de matrículas, asignaturas, horarios de clase, docentes y escuelas profesionales de la Universidad Nacional del Santa. Este proyecto fue desarrollado para optimizar los procesos académicos universitarios, aplicando los fundamentos de Ingeniería de Sistemas desde Nuevo Chimbote.

## 🚀 Arquitectura y Módulos

El sistema está diseñado para abarcar de forma integral el flujo académico universitario a través de las siguientes áreas:

* **Gestión de Usuarios:** Administración del padrón detallado de estudiantes y el registro oficial de la plana docente.
* **Gestión Académica:** Control operativo de las matrículas, catálogo del plan curricular (cursos) y administración de las escuelas profesionales.
* **Logística Operativa:** Manejo de la infraestructura (aulas físicas, laboratorios) y programación de horarios semanales interactivos para evitar cruces.

## 🛠️ Tecnologías Utilizadas

| Entorno | Tecnología / Framework |
| :--- | :--- |
| **Backend** | Laravel, PHP, MySQL |
| **Frontend** | React.js, Inertia.js, Plantillas Blade |
| **Herramientas** | Vite (Compilador), NPM, Composer |

## ⚙️ Despliegue Local

1. Clonar el repositorio y duplicar el archivo `.env.example` renombrándolo a `.env`.
2. Configurar las credenciales de la base de datos local dentro del nuevo `.env`.
3. Descargar las dependencias del servidor ejecutando `composer install`.
4. Descargar las dependencias de la interfaz ejecutando `npm install`.
5. Construir las tablas y datos de prueba con `php artisan migrate:fresh --seed`.
6. Compilar los assets y arrancar la interfaz usando `npm run dev`.
7. Levantar el servidor backend en una segunda terminal con `php artisan serve`.

## 👥 Equipo de Desarrollo

* Giraldo Barreto Eddy
* Hinostroza Melo Diego
* Lecca Tarazona Rodrigo
* Liñán Briones Juan Carlos
* Miranda Vega Erick
* Sánchez Portalino Mayerling