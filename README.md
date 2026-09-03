# Test Vocacional de Unisite

A comprehensive vocational assessment platform built to help users discover their ideal career path through interactive testing and evaluation.

## 📋 Project Overview

**Test Vocacional de Unisite** is a web-based vocational aptitude testing system designed to guide students and professionals in identifying their strengths, interests, and suitable career directions. This project demonstrates full-stack web development capabilities with a focus on user experience and data analysis.

## ✨ Key Features

- **Interactive Vocational Assessment** - Comprehensive multiple-choice questionnaire designed to evaluate aptitudes and interests
- **Dynamic Result Analysis** - Intelligent scoring system that analyzes responses and generates personalized career recommendations
- **User-Friendly Interface** - Clean, intuitive design with Bootstrap for responsive and accessible layouts
- **Real-time Interaction** - JavaScript-powered dynamic features and form validation
- **Data Persistence** - Secure storage and retrieval of user assessment results using MySQL
- **Career Path Guidance** - Detailed recommendations based on assessment outcomes

## 🛠️ Technology Stack

- **Backend**: PHP
  - Server-side logic and data processing
  - Assessment algorithm and scoring system
  - Database management and API endpoints
  
- **Frontend**: 
  - **JavaScript** - Interactive features, form validation, and dynamic UI updates
  - **Bootstrap** - Responsive framework for professional UI design
  - **CSS** - Custom styling and enhanced visual design
  
- **Database**: MySQL
  - Relational database for storing assessment questions, results, and user data
  - Optimized queries for performance

- **Architecture**: Full-stack web application with MVC pattern

## 🎯 Core Functionality

### Assessment Module
- Structured questionnaire with multiple assessment categories
- JavaScript-powered form validation and progress tracking
- Real-time response validation
- Progressive questionnaire flow with Bootstrap-styled UI

### Scoring & Analysis Engine
- Automatic calculation and weighting of responses
- Aptitude profile generation
- Career path matching algorithm
- MySQL database queries for efficient data retrieval

### Result Presentation
- Personalized career recommendations with interactive charts
- Aptitude breakdown and insights
- Comparative career analysis
- Responsive design across all devices

### User Experience
- Bootstrap responsive grid system
- Mobile-first design approach
- Smooth JavaScript interactions
- Accessible form elements and navigation

## 💼 Portfolio Highlights

This project demonstrates proficiency in:

✅ **Full-Stack Web Development**
- Complete user journey from assessment to results
- Frontend-backend integration with PHP APIs
- Database-driven application architecture

✅ **Backend Development**
- PHP application development and server-side logic
- MySQL database design, queries, and optimization
- Business logic implementation for complex algorithms
- RESTful endpoints for data handling

✅ **Frontend Development**
- Responsive design with Bootstrap framework
- JavaScript DOM manipulation and event handling
- Form validation and real-time user feedback
- CSS customization and styling

✅ **Database Management**
- Relational database schema design
- Efficient query optimization
- Data integrity and security
- User data management

✅ **Problem Solving**
- Complex scoring algorithm implementation
- Data analysis and interpretation
- User experience optimization
- Performance optimization

✅ **Software Engineering Practices**
- Version control (Git)
- Code organization and structure
- Clean, maintainable code
- Production-ready application

## 🚀 Getting Started

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Modern web browser with JavaScript enabled

### Installation

1. Clone the repository:
```bash
git clone https://github.com/Dr-Bugieman/TestVocacionalUnisite.git
cd TestVocacionalUnisite
```

2. Configure your web server to point to the project directory

3. Set up the database:
   - Create a new MySQL database
   - Import the database schema (SQL files included in the project)
   - ```sql
     mysql -u username -p database_name < schema.sql
     ```

4. Update configuration files with your database credentials:
   - Edit `config/database.php` with your MySQL connection details

5. Ensure proper permissions on project directories

6. Access the application through your web server:
   ```
   http://localhost/TestVocacionalUnisite
   ```

## 📊 Assessment Categories

The vocational test evaluates key areas including:
- Technical aptitudes
- Creative abilities
- Social skills
- Analytical thinking
- Leadership potential
- Communication proficiency

## 📈 Result Interpretation

Results provide:
- Individual aptitude scores with visual representations
- Recommended career clusters
- Skill development suggestions
- Further education pathways
- Downloadable or shareable results

## 🎓 Use Cases

- **Educational Guidance** - Helping students choose appropriate study paths
- **Career Counseling** - Supporting professionals in career transitions
- **Talent Assessment** - Evaluating skills and aptitudes for various roles
- **Educational Institutions** - Integration with guidance counselor tools
- **HR Applications** - Employee skill assessment and development

## 📁 Project Structure

```
TestVocacionalUnisite/
├── index.php                 # Main entry point
├── config/                   # Configuration files (database, settings)
│   └── database.php         # MySQL connection configuration
├── assets/
│   ├── css/                 # CSS stylesheets
│   ├── js/                  # JavaScript files
│   └── img/                 # Images and media
├── includes/                # PHP includes and utilities
├── pages/                   # Main page templates
│   ├── assessment.php       # Questionnaire page
│   └── results.php          # Results display page
├── api/                     # PHP API endpoints
│   ├── submit_assessment.php
│   └── get_results.php
├── database/                # Database schemas and queries
│   ├── schema.sql           # Database structure
│   └── queries.php          # Database helper functions
├── vendor/                  # Third-party libraries (Bootstrap, etc.)
└── README.md
```

## 🔒 Security & Privacy

- Secure password handling for user accounts
- Session management best practices
- SQL injection prevention with prepared statements
- XSS protection and input validation
- CSRF token implementation
- Secure database connection configuration

## 📝 Development Highlights

### PHP Backend
- Object-oriented programming principles
- Database abstraction layer
- Error handling and logging
- API endpoints for AJAX requests

### JavaScript Frontend
- Event-driven programming
- DOM manipulation and styling
- Form validation and error handling
- Asynchronous requests (AJAX/Fetch API)
- Bootstrap integration

### Bootstrap Framework
- Responsive grid system
- Pre-built components (forms, buttons, modals)
- Mobile-first design
- Accessibility features

### MySQL Database
- Normalized schema design
- Indexed queries for performance
- Transaction management
- Data relationships and integrity

## 🔄 Future Enhancements

- Advanced result visualization with charts (Chart.js)
- Multi-language support
- User authentication and profile system
- Mobile app version
- Analytics dashboard for administrators
- API integration with educational platforms
- Email notifications and result sharing
- Improved accessibility features

## 👨‍💼 Author

**Dr-Bugieman**

Full-stack web developer with expertise in PHP, JavaScript, Bootstrap, MySQL, and user-centric application development.

## 📞 Contact & Support

For inquiries about this project or my development services, please reach out through GitHub.

## 📄 License

This project is available in the Dr-Bugieman/TestVocacionalUnisite repository.

---

**Project Status**: Active  
**Last Updated**: September 2025  
**Repository Type**: Private Portfolio Project  
**Technologies**: PHP | JavaScript | Bootstrap | CSS | MySQL
