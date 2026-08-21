### CODE TAYO
A personal project that aims to develop a learning, library, source platform for aspiring and even for already developers that wants to upskill or understand more the important concepts of programming and many more.

This project aims also to be more undesrtandable for Filipino learners by adding tagalog language.

```
CODE-TAYO/
│
├── backend/                          ← PHP API
│   ├── public/
│   │   └── index.php                 ← Entry point, all requests route here
│   │
│   ├── src/
│   │   ├── Config/
│   │   │   ├── Database.php          ← PDO connection (singleton)
│   │   │   └── Env.php               ← Loads .env variables
│   │   │
│   │   ├── Core/
│   │   │   ├── Router.php            ← Maps URL + method → controller
│   │   │   ├── Request.php           ← Wraps $_GET, $_POST, JSON body
│   │   │   ├── Response.php          ← Standardized JSON response helper
│   │   │   └── Middleware/
│   │   │       ├── AuthMiddleware.php
│   │   │       ├── CorsMiddleware.php
│   │   │       └── CsrfMiddleware.php
│   │   │
│   │   ├── Modules/
│   │   │   ├── Auth/
│   │   │   │   ├── Controllers/AuthController.php
│   │   │   │   ├── Services/AuthService.php
│   │   │   │   └── Models/User.php
│   │   │   │
│   │   │   ├── Products/
│   │   │   │   ├── Controllers/ProductController.php
│   │   │   │   ├── Services/ProductService.php
│   │   │   │   └── Models/Product.php
│   │   │   │
│   │   │   └── Orders/
│   │   │       ├── Controllers/OrderController.php
│   │   │       ├── Services/OrderService.php
│   │   │       └── Models/Order.php
│   │   │
│   │   └── Helpers/
│   │       ├── Validator.php
│   │       └── ResponseFormatter.php
│   │
│   ├── routes/
│   │   └── api.php                   ← All route definitions
│   │
│   ├── vendor/                       ← Composer packages
│   ├── .env                          ← DB credentials, secrets
│   ├── composer.json
│   └── .htaccess                     ← Rewrite all to index.php
│
├── frontend/                         ← React app
│   ├── public/
│   │   └── index.html
│   │
│   ├── src/
│   │   ├── api/
│   │   │   ├── axiosClient.js        ← Base axios instance + interceptors
│   │   │   ├── authApi.js
│   │   │   ├── productApi.js
│   │   │   └── orderApi.js
│   │   │
│   │   ├── components/
│   │   │   ├── common/                ← Buttons, Inputs, Modals
│   │   │   ├── layout/                ← Navbar, Sidebar, Footer
│   │   │   └── auth/                  ← LoginForm, RegisterForm
│   │   │
│   │   ├── pages/
│   │   │   ├── Login.jsx
│   │   │   ├── Dashboard.jsx
│   │   │   ├── Products.jsx
│   │   │   └── Orders.jsx
│   │   │
│   │   ├── context/
│   │   │   └── AuthContext.jsx        ← Global auth state
│   │   │
│   │   ├── hooks/
│   │   │   ├── useAuth.js
│   │   │   └── useFetch.js
│   │   │
│   │   ├── routes/
│   │   │   └── AppRoutes.jsx          ← React Router setup
│   │   │
│   │   ├── utils/
│   │   │   └── validators.js
│   │   │
│   │   ├── App.jsx
│   │   └── main.jsx
│   │
│   ├── .env                           ← VITE_API_URL=http://localhost/backend/public
│   ├── package.json
│   └── vite.config.js
│
└── README.md
```


## geloxh