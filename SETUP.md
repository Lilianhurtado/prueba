# 🚀 Guía de Instalación y Configuración del Proyecto

Esta guía contiene todos los comandos necesarios para configurar y ejecutar el proyecto Laravel desde cero.

---

## 📋 Requisitos Previos

-   PHP 8.2 o superior
-   Composer
-   Node.js 20.19+ o 22.12+ (recomendado)
-   NPM

---

## 🔧 Instalación Paso a Paso

### 1. Clonar el Repositorio (si aplica)

```bash
git clone <repository-url>
cd prueba
```

### 2. Configurar Variables de Entorno

```bash
cp .env.example .env
```

### 3. Instalar Dependencias de PHP

```bash
composer install --no-cache
```

### 4. Generar Clave de Aplicación

```bash
php artisan key:generate
```

### 5. Crear Base de Datos y Ejecutar Migraciones

```bash
# Crear archivo de base de datos SQLite
touch database/database.sqlite

# Ejecutar migraciones y seeders
php artisan migrate --seed
```

### 6. Instalar Dependencias de Node.js

```bash
npm install
```

### 7. Compilar Assets para Producción

```bash
npm run build
```

---

## 🎯 Ejecutar el Proyecto

### Opción 1: Servidor de Desarrollo Simple

```bash
php artisan serve
```

**Acceder a:** http://localhost:8000

### Opción 2: Servidor con Vite en Modo Desarrollo (Recomendado)

**Terminal 1 - Servidor Laravel:**

```bash
php artisan serve
```

**Terminal 2 - Vite (Hot Reload):**

```bash
npm run dev
```

**Acceder a:** http://localhost:8000

### Opción 3: Modo Desarrollo Completo (Todo en Uno)

```bash
composer dev
```

Este comando ejecuta automáticamente:

-   ✅ Servidor web PHP (localhost:8000)
-   ✅ Worker de colas
-   ✅ Logs en tiempo real (Pail)
-   ✅ Vite con Hot Module Replacement

---

## 🔐 Credenciales de Acceso

### Usuario de Prueba

-   **Email:** `joel@tecnm.com`
-   **Contraseña:** `12345678`
-   **Nombre:** Joel Andrade

---

## 👥 Roles del Sistema

El sistema cuenta con 4 roles predefinidos:

1. **Paciente**
2. **Doctor**
3. **Recepcionista**
4. **Administrador**

---

## 📊 Información de la Base de Datos

-   **Motor:** SQLite
-   **Archivo:** `database/database.sqlite`
-   **Tablas:** 15 tablas
-   **Tamaño inicial:** ~140 KB

### Verificar Base de Datos

```bash
php artisan db:show
```

### Inspeccionar Datos

```bash
# Ver roles
php artisan tinker --execute="foreach (\Spatie\Permission\Models\Role::all() as \$role) { echo '- ' . \$role->name . PHP_EOL; }"

# Ver usuarios
php artisan tinker --execute="foreach (\App\Models\User::all() as \$user) { echo '- ' . \$user->name . ' (' . \$user->email . ')' . PHP_EOL; }"
```

---

## 🛠️ Comandos Útiles

### Desarrollo

```bash
# Limpiar caché de configuración
php artisan config:clear

# Limpiar caché de rutas
php artisan route:clear

# Limpiar caché de vistas
php artisan view:clear

# Limpiar todas las cachés
php artisan optimize:clear
```

### Base de Datos

```bash
# Refrescar base de datos (CUIDADO: elimina todos los datos)
php artisan migrate:fresh --seed

# Ver estado de migraciones
php artisan migrate:status

# Crear nueva migración
php artisan make:migration nombre_de_migracion

# Crear nuevo seeder
php artisan make:seeder NombreSeeder
```

### Testing

```bash
# Ejecutar tests
php artisan test

# O con composer
composer test
```

---

## 🏗️ Stack Tecnológico

-   **Framework:** Laravel 12.28.1
-   **PHP:** 8.4.4
-   **Frontend:** Livewire 3.6.4
-   **CSS:** TailwindCSS 3.4
-   **UI Components:** WireUI 2.4, Flowbite 3.1
-   **Autenticación:** Laravel Jetstream 5.3 + Fortify 1.30
-   **Permisos:** Spatie Laravel Permission 6.21
-   **Internacionalización:** Laravel Lang (Español)
-   **Base de Datos:** SQLite 3.50.4

---

## 📁 Estructura de Directorios Principales

```
prueba/
├── app/
│   ├── Actions/          # Acciones de Fortify/Jetstream
│   ├── Http/
│   │   └── Controllers/  # Controladores
│   ├── Livewire/         # Componentes Livewire
│   └── Models/           # Modelos Eloquent
├── database/
│   ├── migrations/       # Migraciones
│   ├── seeders/         # Seeders
│   └── database.sqlite  # Base de datos SQLite
├── resources/
│   ├── css/             # Estilos
│   ├── js/              # JavaScript
│   └── views/           # Vistas Blade
├── routes/
│   ├── admin.php        # Rutas del admin
│   ├── api.php          # Rutas API
│   └── web.php          # Rutas web
└── public/              # Archivos públicos
```

---

## 🐛 Solución de Problemas

### Error: "Permission denied" al instalar dependencias

```bash
# Usar permisos completos
composer install --no-cache
npm install
```

### Error: "Application key not set"

```bash
php artisan key:generate
```

### Error: Base de datos no existe

```bash
touch database/database.sqlite
php artisan migrate --seed
```

### Error: Assets no cargan

```bash
npm run build
# O para desarrollo
npm run dev
```

### Conflictos de Git sin resolver

```bash
# Buscar archivos con conflictos
grep -r "<<<<<<< HEAD" resources/ --files-with-matches

# Resolver manualmente o contactar al desarrollador
```

---

## 📞 Soporte

Para problemas o preguntas, contacta al equipo de desarrollo.

---

**Última actualización:** Noviembre 2025
