<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        :root {
            --background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDJ8fGJsdXJ8ZW58MHx8fHwxNjg3NTY5NzA1&ixlib=rb-4.0.3&q=80&w=1080');
            --surface: #111111;
            --surface-2: #1a1a1a;
            --border: #333333;
            --text: #ffffff;
            --text-secondary:rgb(255, 255, 255);
            --accent: #d94e41;
            --success: #4CAF50;
            --danger: #ff4444;
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            --radius: 20px;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--background);
            background-image: var(--background-image);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
            overscroll-behavior: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .logo {
            font-size: 3rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 10px;
            letter-spacing: -1px;
            animation: fadeDown 0.8s ease-out;
        }

        .subtitle {
            font-size: 1.4rem;
            color: var(--text-secondary);
            font-weight: 300;
            animation: fadeUp 0.8s ease-out;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        @media (min-width: 1024px) {
            .main-content {
                grid-template-columns: 2fr 1fr;
            }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .glass-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.6);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: '';
            display: inline-block;
            width: 12px;
            height: 12px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        input, select, textarea {
            width: 100%;
            padding: 14px 16px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text);
            font-size: 1rem;
            transition: var(--transition);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(217, 78, 65, 0.1);
        }

        button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 24px;
            background: var(--accent);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(217, 78, 65, 0.2);
        }

        button:active {
            transform: translateY(0);
        }

        button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 150%;
            height: 150%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%) scale(0);
            border-radius: 50%;
            transition: transform 0.5s ease-out;
        }

        button:active::after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0;
        }

        .habit-item {
            background: var(--surface-2);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .habit-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--accent), transparent);
            border-radius: 16px 16px 0 0;
        }

        .habit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .habit-title {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .habit-frequency {
            font-size: 0.9rem;
            color: var(--text-secondary);
            background: rgba(255, 255, 255, 0.05);
            padding: 4px 12px;
            border-radius: 20px;
        }

        .habit-description {
            color: var(--text-secondary);
            margin-bottom: 15px;
            font-weight: 300;
        }

        .progress-container {
            margin-top: 15px;
        }

        .progress-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), #ff8c5c);
            border-radius: 10px;
            transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .progress-text {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .daily-checkboxes {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .day-checkbox {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .day-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .checkbox {
            width: 35px;
            height: 35px;
            border: 2px solid var(--border);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.02);
        }

        .checkbox:hover {
            border-color: var(--accent);
            transform: scale(1.05);
        }

        .checkbox.checked {
            background: linear-gradient(135deg, var(--accent), #ff8c5c);
            border-color: transparent;
        }

        .checkbox.checked::after {
            content: "✓";
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .habit-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .btn-danger {
            background: rgba(255, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(255, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background: var(--danger);
            color: white;
            border-color: transparent;
        }

        .suggestions-list {
            margin-top: 15px;
        }

        .suggestion-item {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 12px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .suggestion-item:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateX(5px);
        }

        .suggestion-item::before {
            content: '💡';
            margin-right: 10px;
        }

        .loading {
            text-align: center;
            padding: 30px;
            color: var(--text-secondary);
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid rgba(255, 255, 255, 0.1);
            border-top-color: var(--accent);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }

        .error {
            color: var(--danger);
            margin-top: 10px;
            font-size: 0.9rem;
            padding: 10px;
            border-radius: 8px;
            background: rgba(255, 68, 68, 0.1);
        }

        .success-message {
            background: rgba(76, 175, 80, 0.1);
            color: var(--success);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            animation: slideInRight 0.5s ease-out;
        }

        /* Animations */
        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.3);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Float animation for habits */
        .habit-item:hover {
            animation: float 2s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--surface);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .logo {
                font-size: 2.5rem;
            }

            .glass-card {
                padding: 20px;
            }

            .habit-item {
                padding: 15px;
            }

            .daily-checkboxes {
                gap: 8px;
            }

            .checkbox {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1 class="logo">HABITS</h1>
            <p class="subtitle">Build consistency in your life</p>
        </header>

        <div class="main-content">
            <div class="habits-section">
                <div class="glass-card">
                    <h2 class="section-title">Create Habit</h2>
                    <form id="habit-form">
                        <div class="form-group">
                            <label for="habit-name">Name</label>
                            <input type="text" id="habit-name" required placeholder="Morning Meditation">
                        </div>
                        <div class="form-group">
                            <label for="habit-description">Description</label>
                            <textarea id="habit-description" rows="2" placeholder="Sleep"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="habit-frequency">Frequency</label>
                            <select id="habit-frequency">
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="habit-target">Target</label>
                            <input type="number" id="habit-target" min="1" value="1">
                        </div>
                        <button type="submit">Add Habit</button>
                    </form>
                    <div id="form-message"></div>
                </div>

                <div style="margin-top: 30px;">
                    <h2 class="section-title">Your Habits</h2>
                    <div id="habits-container">
                        <div class="loading">
                            <div class="loading-spinner"></div>
                            <p>Loading habits...</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="suggestions-section">
                <div class="glass-card">
                    <h2 class="section-title">AI Insights</h2>
                    <div id="suggestions-container">
                        <div class="loading">
                            <div class="loading-spinner"></div>
                            <p>Generating insights...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // API endpoints
        const API_BASE_URL = '/api';
        const ENDPOINTS = {
            GET_HABITS: `${API_BASE_URL}/habits.php`,
            ADD_HABIT: `${API_BASE_URL}/add_habit.php`,
            UPDATE_PROGRESS: `${API_BASE_URL}/update_progress.php`,
            DELETE_HABIT: `${API_BASE_URL}/delete_habit.php`,
            GENERATE_SUGGESTIONS: `${API_BASE_URL}/generate_suggestions.php`,
            GET_SUGGESTIONS: `${API_BASE_URL}/suggestions.php`,
        };
// Example: Fetch habits and display
fetch('/api/habits.php') 
  .then(res => res.json())
  .then(data => {
    console.log(data); // Render habits in your UI
  });

// Example: Add a habit
function addHabit(habit) {
  fetch('/api/habits.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(habit)
  })
  .then(res => res.json())
  .then(data => {
    // Refresh habit list or show success
  });
}
        // DOM Elements
        const habitForm = document.getElementById('habit-form');
        const habitNameInput = document.getElementById('habit-name');
        const habitDescriptionInput = document.getElementById('habit-description');
        const habitFrequencyInput = document.getElementById('habit-frequency');
        const habitTargetInput = document.getElementById('habit-target');
        const formMessage = document.getElementById('form-message');
        const habitsContainer = document.getElementById('habits-container');
        const suggestionsContainer = document.getElementById('suggestions-container');

        // Initialize the app
        document.addEventListener('DOMContentLoaded', () => {
            fetchHabits();
            fetchSuggestions();
            setupEventListeners();
        });

        // Setup event listeners
        function setupEventListeners() {
            habitForm.addEventListener('submit', handleHabitFormSubmit);
        }

        // Fetch habits from the API
        async function fetchHabits() {
            try {
                // Demo habits data instead of API call (replace this with actual API call when ready)
                const habits = [
                    {
                        id: 1,
                        name: "Morning Meditation",
                        description: "10 minutes of mindfulness meditation",
                        frequency: "daily",
                        target: 1,
                        current_progress: 1,
                        daily_progress: [true, true, false, true, false, false, false]
                    },
                    {
                        id: 2,
                        name: "Read Books",
                        description: "Read for personal development",
                        frequency: "daily",
                        target: 30,
                        current_progress: 15,
                        daily_progress: [true, true, true, false, false, false, false]
                    },
                    {
                        id: 3,
                        name: "Exercise",
                        description: "30 minutes of physical activity",
                        frequency: "weekly",
                        target: 5,
                        current_progress: 2,
                        daily_progress: [true, false, true, false, false, false, false]
                    }
                ];
                renderHabits(habits);
            } catch (error) {
                console.error('Error fetching habits:', error);
                habitsContainer.innerHTML = `<div class="error">Failed to load habits. Please try again later.</div>`;
            }
        }

        // Fetch AI suggestions from the API
        async function fetchSuggestions() {
            try {
                // Demo suggestions data instead of API call (replace this with actual API call when ready)
                const suggestions = [
                    {
                        id: 1,
                        text: "Try adding a hydration habit - drinking enough water improves focus and energy."
                    },
                    {
                        id: 2,
                        text: "Based on your meditation habit, you might enjoy a gratitude journaling practice."
                    },
                    {
                        id: 3,
                        text: "Consider a 'no screens before bed' habit to improve sleep quality."
                    }
                ];
                renderSuggestions(suggestions);
            } catch (error) {
                console.error('Error fetching suggestions:', error);
                suggestionsContainer.innerHTML = `<div class="error">Failed to load suggestions. Please try again later.</div>`;
            }
        }

        // Handle habit form submission
        async function handleHabitFormSubmit(event) {
            event.preventDefault();
            
            const habitData = {
                name: habitNameInput.value,
                description: habitDescriptionInput.value,
                frequency: habitFrequencyInput.value,
                target: parseInt(habitTargetInput.value)
            };

            try {
                // Simulating API call success
                formMessage.innerHTML = `<div class="success-message">Habit added successfully!</div>`;
                habitForm.reset();
                fetchHabits();
                
                setTimeout(() => {
                    formMessage.innerHTML = '';
                }, 3000);
                
            } catch (error) {
                console.error('Error adding habit:', error);
                formMessage.innerHTML = `<div class="error">Failed to add habit. Please try again.</div>`;
            }
        }

        // Update habit progress
        async function updateProgress(habitId, increment = true) {
            try {
                // Simulating API call success
                fetchHabits();
            } catch (error) {
                console.error('Error updating progress:', error);
                alert('Failed to update progress. Please try again.');
            }
        }

        // Delete a habit
        async function deleteHabit(habitId) {
            if (!confirm('Are you sure you want to delete this habit?')) {
                return;
            }
            
            try {
                // Simulating API call success
                fetchHabits();
            } catch (error) {
                console.error('Error deleting habit:', error);
                alert('Failed to delete habit. Please try again.');
            }
        }

        // Toggle daily checkbox
        async function toggleDayCheckbox(habitId, dayIndex, checked) {
            try {
                // Simulating API call success
                fetchHabits();
            } catch (error) {
                console.error('Error updating progress:', error);
                alert('Failed to update progress. Please try again.');
            }
        }

        // Render habits to the DOM
        function renderHabits(habits) {
            if (!habits || habits.length === 0) {
                habitsContainer.innerHTML = `<p>No habits found. Add your first habit above!</p>`;
                return;
            }

            const daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            
            const habitsHTML = habits.map(habit => {
                const progress = habit.current_progress || 0;
                const target = habit.target || 1;
                const progressPercentage = Math.min(100, (progress / target) * 100);
                
                // Generate daily checkboxes
                const checkboxesHTML = daysOfWeek.map((day, index) => {
                    const isChecked = habit.daily_progress && habit.daily_progress[index];
                    return `
                        <div class="day-checkbox">
                            <div class="checkbox ${isChecked ? 'checked' : ''}" 
                                 onclick="toggleDayCheckbox(${habit.id}, ${index}, ${isChecked})">
                            </div>
                            <span class="day-label">${day}</span>
                        </div>
                    `;
                }).join('');

                return `
                    <div class="habit-item" data-id="${habit.id}">
                        <div class="habit-header">
                            <h3 class="habit-title">${habit.name}</h3>
                            <span class="habit-frequency">${habit.frequency}</span>
                        </div>
                        <p class="habit-description">${habit.description || ''}</p>
                        
                        <div class="progress-container">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: ${progressPercentage}%"></div>
                            </div>
                            <div class="progress-text">
                                <span>Progress: ${progress}/${target}</span>
                                <span>${progressPercentage.toFixed(0)}%</span>
                            </div>
                        </div>
                        
                        <div class="daily-checkboxes">
                            ${checkboxesHTML}
                        </div>
                        
                        <div class="habit-actions">
                            <button class="btn-secondary" onclick="updateProgress(${habit.id}, true)">
                                Log Progress
                            </button>
                            <button class="btn-danger" onclick="deleteHabit(${habit.id})">
                                Delete
                            </button>
                        </div>
                    </div>
                `;
            }).join('');

            habitsContainer.innerHTML = habitsHTML;
        }

        // Render AI suggestions to the DOM
        function renderSuggestions(suggestions) {
            if (!suggestions || suggestions.length === 0) {
                suggestionsContainer.innerHTML = `<p>No insights available at the moment.</p>`;
                return;
            }

            const suggestionsHTML = suggestions.map(suggestion => {
                return `
                    <div class="suggestion-item">
                        <p>${suggestion.text}</p>
                    </div>
                `;
            }).join('');

            suggestionsContainer.innerHTML = `<div class="suggestions-list">${suggestionsHTML}</div>`;
        }
    </script>
</body>
</html>