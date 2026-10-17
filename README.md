# Sistema de Cálculo de Circunferencia 🟣

Este es un proyecto web desarrollado en PHP y MySQL (bajo el patrón MVC) que permite calcular el área y el perímetro de una circunferencia a partir de su radio, guardando un historial de resultados.

## 🛠️ Tecnologías utilizadas
- **PHP 8+** (Lógica del servidor y PDO)
- **MySQL / MariaDB** (Base de datos)
- **HTML5 y CSS3** (Interfaz gráfica)
- **JavaScript** (Cálculo dinámico en tiempo real)

## 🚀 Requisitos previos
- Tener instalado **XAMPP** (o cualquier servidor Apache con PHP y MySQL).
- Un navegador web moderno.

## ⚙️ Instalación
1. Clona o descarga este repositorio dentro de la carpeta `htdocs` de XAMPP (ej. `C:\xampp\htdocs\Circunferencia_Cris`).
2. Abre el panel de control de XAMPP e inicia los módulos **Apache** y **MySQL**.
3. Ve a `http://localhost/phpmyadmin/` y crea una base de datos llamada `circunferencia_cris`.
4. Importa el archivo `database/circunferencia_cris.sql` (que se encuentra en la carpeta `database` de este proyecto) para crear las tablas y el usuario administrador.
5. En tu navegador, ingresa a: `http://localhost/Circunferencia_Cris/`

## 🔐 Credenciales por defecto
- **Correo:** `admin@circu`
- **Clave:** `2929`

## ✨ Funcionalidades
- Inicio de sesión seguro con manejo de sesiones.
- Formulario para ingresar el radio.
- Cálculo automático del área (π * r²) y perímetro (2 * π * r).
- Guardado del historial en la base de datos (vinculado al usuario logueado).
- Búsqueda y eliminación de registros.
- Diseño responsivo y amigable con el usuario.

---
*Desarrollado por: Juliana Cristina Ramírez*