# Fiction Interactive - Laravel & Vue.js
Ce projet est une application de fiction interactive utilisant Laravel pour le backend et Vue.js pour le frontend. Les utilisateurs peuvent naviguer à travers des histoires interactives, faire des choix et progresser dans le récit.
## Structure du projet

```bash
Fiction/
├── backend/      # Laravel 12 - API RESTful authentification, BD
├── frontend/     # Vue 3 - Interface utilisateur 
└── README.md     # Présentation du projet
```

## Prérequis
- Node.js >= 16.x
- PHP >= 8.1
- Composer >= 2.x
- SQLite

## Installation

### 1. Cloner le dépôt :
```bash
git clone https://github.com/Loriane-2009/FictionInt.git
cd FictionInt
```

### 2. Backend - Laravel
```bash
cd backend
composer install
cp .env.example .env
php artisan migrate
php artisan serve
```

### 3. Frontend - Vue.js
```bash
cd ../frontend
npm install
npm run dev
```

## Licence
Projet réalisé dans le cadre des cours HEIG-VD – DevProdMed / WebMobUI.
