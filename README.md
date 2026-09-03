# Test Vocacional Unisite - Portafolio

[English](#english) | [Español](#español)

---

## Español

### 📋 Descripción

Este proyecto es una versión **sanitizada y adaptada** del Test Vocacional de Unisite, diseñada para funcionamiento **sin dependencias de base de datos**. Se trata de una aplicación web interactiva que ayuda a los usuarios a descubrir orientaciones vocacionales mediante un conjunto de preguntas basadas en intereses, habilidades y aptitudes personales.

La aplicación está optimizada para ser portátil, rápida y fácil de desplegar, utilizando datos estáticos integrados en el código.

### ✨ Características

- **Cuestionario Interactivo**: Preguntas diseñadas para evaluar intereses y aptitudes vocacionales
- **Análisis Inteligente**: Algoritmo de evaluación que proporciona recomendaciones personalizadas
- **Sin Base de Datos**: Funcionamiento completamente independiente, ideal para portfolios y demostraciones
- **Interfaz Intuitiva**: Diseño limpio y responsivo para una experiencia de usuario óptima
- **Resultados Detallados**: Informe completo con orientaciones vocacionales recomendadas
- **Despliegue Simple**: Fácil de ejecutar localmente o en cualquier servidor estático

### 🎯 Propósito

Este proyecto demuestra:
- Desarrollo frontend interactivo
- Lógica de procesamiento de datos en cliente
- Gestión de estado de aplicación
- Algoritmos de evaluación y recomendación
- Diseño responsivo y experiencia de usuario
- Prácticas de desarrollo web moderno

### 🚀 Casos de Uso

- **Portfolios Técnicos**: Demostración de capacidades de desarrollo web
- **Demostraciones Rápidas**: Proyecto sin dependencias externas
- **Educación**: Herramienta educativa para aprender sobre orientación vocacional
- **Prototipado**: Base sólida para futuras expansiones

### 🛠️ Tecnologías Utilizadas

El proyecto utiliza tecnologías modernas y ligeras:
- Frontend responsivo y dinámico
- Lógica de negocio en JavaScript/TypeScript
- Almacenamiento de datos estático en JSON/objetos
- Gestión de estado del cliente
- CSS moderno y responsive

### 📊 Estructura del Proyecto

```
TestVocacionalUnisitePubllic/
├── README.md                 # Este archivo
├── index.html               # Punto de entrada de la aplicación
├── css/                     # Estilos de la aplicación
├── js/                      # Lógica y algoritmos
│   ├── preguntas.js        # Base de preguntas
│   ├── carreras.js         # Base de carreras/orientaciones
│   ├── test.js             # Lógica del test
│   └── resultados.js       # Procesamiento de resultados
└── data/                    # Datos estáticos JSON (si aplica)
```

### ⚙️ Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/Dr-Bugieman/TestVocacionalUnisitePubllic.git
cd TestVocacionalUnisitePubllic
```

2. **Ejecutar localmente**
   - Opción 1: Abrir `index.html` directamente en el navegador
   - Opción 2: Usar un servidor local simple:
   ```bash
   # Python 3
   python -m http.server 8000
   
   # Node.js (con http-server)
   npx http-server
   ```

3. **Acceder a la aplicación**
   - Abrir en el navegador: `http://localhost:8000`

### 🎓 Cómo Usar

1. Abre la aplicación en tu navegador
2. Lee las instrucciones iniciales
3. Responde todas las preguntas del cuestionario
4. Recibe un análisis personalizado con orientaciones vocacionales recomendadas
5. Descubre carreras y campos profesionales alineados con tus intereses

### 🔍 Ventajas de Esta Versión

- ✅ **Independiente**: No requiere servidor backend ni base de datos
- ✅ **Rápida**: Ejecución instantánea sin latencia de red
- ✅ **Portable**: Funciona en cualquier navegador moderno
- ✅ **Segura**: Todo se procesa localmente, sin envío de datos
- ✅ **Fácil de Mantener**: Código limpio y bien documentado
- ✅ **Escalable**: Base sólida para agregar más carreras o preguntas

### 📝 Personalización

Para agregar nuevas preguntas o carreras, simplemente edita:
- `js/preguntas.js` - Agregar nuevas preguntas
- `js/carreras.js` - Agregar nuevas orientaciones vocacionales
- `css/` - Personalizar estilos y diseño

### 🤝 Contribuciones

Este es un proyecto de portafolio. Si deseas sugerir mejoras o reportar problemas, siéntete libre de abrir un issue.

### 📝 Licencia

Este proyecto es público y se proporciona como material de portafolio.

### 👤 Autor

**Dr-Bugieman**
- GitHub: [@Dr-Bugieman](https://github.com/Dr-Bugieman)

---

## English

### 📋 Description

This project is a **sanitized and adapted version** of the Unisite Vocational Test, designed to function **without database dependencies**. It is an interactive web application that helps users discover vocational guidance through a series of questions based on personal interests, skills, and aptitudes.

The application is optimized to be portable, fast, and easy to deploy, using static data embedded in the code.

### ✨ Features

- **Interactive Questionnaire**: Questions designed to evaluate vocational interests and aptitudes
- **Intelligent Analysis**: Evaluation algorithm that provides personalized recommendations
- **No Database**: Completely independent operation, ideal for portfolios and demonstrations
- **Intuitive Interface**: Clean and responsive design for optimal user experience
- **Detailed Results**: Comprehensive report with recommended vocational guidance
- **Simple Deployment**: Easy to run locally or on any static server

### 🎯 Purpose

This project demonstrates:
- Interactive frontend development
- Client-side data processing logic
- Application state management
- Evaluation and recommendation algorithms
- Responsive design and user experience
- Modern web development practices

### 🚀 Use Cases

- **Technical Portfolios**: Demonstration of web development capabilities
- **Quick Demos**: Project without external dependencies
- **Education**: Educational tool for learning about vocational guidance
- **Prototyping**: Solid foundation for future expansions

### 🛠️ Technologies Used

The project utilizes modern and lightweight technologies:
- Responsive and dynamic frontend
- Business logic in JavaScript/TypeScript
- Static data storage in JSON/objects
- Client-side state management
- Modern and responsive CSS

### 📊 Project Structure

```
TestVocacionalUnisitePubllic/
├── README.md                 # This file
├── index.html               # Application entry point
├── css/                     # Application styles
├── js/                      # Logic and algorithms
│   ├── preguntas.js        # Questions database
│   ├── carreras.js         # Career/guidance database
│   ├── test.js             # Test logic
│   └── resultados.js       # Results processing
└── data/                    # Static JSON data (if applicable)
```

### ⚙️ Installation

1. **Clone the repository**
```bash
git clone https://github.com/Dr-Bugieman/TestVocacionalUnisitePubllic.git
cd TestVocacionalUnisitePubllic
```

2. **Run locally**
   - Option 1: Open `index.html` directly in your browser
   - Option 2: Use a simple local server:
   ```bash
   # Python 3
   python -m http.server 8000
   
   # Node.js (with http-server)
   npx http-server
   ```

3. **Access the application**
   - Open in your browser: `http://localhost:8000`

### 🎓 How to Use

1. Open the application in your browser
2. Read the initial instructions
3. Answer all questions in the questionnaire
4. Receive personalized analysis with recommended vocational guidance
5. Discover careers and professional fields aligned with your interests

### 🔍 Advantages of This Version

- ✅ **Independent**: No backend server or database required
- ✅ **Fast**: Instant execution without network latency
- ✅ **Portable**: Works in any modern browser
- ✅ **Secure**: Everything is processed locally, no data transmission
- ✅ **Easy to Maintain**: Clean and well-documented code
- ✅ **Scalable**: Solid foundation for adding more careers or questions

### 📝 Customization

To add new questions or careers, simply edit:
- `js/preguntas.js` - Add new questions
- `js/carreras.js` - Add new vocational orientations
- `css/` - Customize styles and design

### 🤝 Contributions

This is a portfolio project. If you wish to suggest improvements or report issues, feel free to open an issue.

### 📝 License

This project is public and provided as portfolio material.

### 👤 Author

**Dr-Bugieman**
- GitHub: [@Dr-Bugieman](https://github.com/Dr-Bugieman)

---

**Last Updated**: 2026-09-03
