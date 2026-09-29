<?php
session_start();
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1><i class="bi bi-stopwatch me-2"></i>Study Timer</h1>
            <p class="lead">Boost your productivity with Pomodoro technique and custom study sessions</p>
        </div>
    </div>

    <!-- Timer Mode Selection -->
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="timerMode" id="pomodoro" value="pomodoro" checked>
                            <label class="btn btn-outline-primary" for="pomodoro">
                                <i class="bi bi-stopwatch"></i> Pomodoro
                            </label>
                            
                            <input type="radio" class="btn-check" name="timerMode" id="shortBreak" value="short">
                            <label class="btn btn-outline-success" for="shortBreak">
                                <i class="bi bi-cup-hot"></i> Short Break
                            </label>
                            
                            <input type="radio" class="btn-check" name="timerMode" id="longBreak" value="long">
                            <label class="btn btn-outline-info" for="longBreak">
                                <i class="bi bi-moon"></i> Long Break
                            </label>
                            
                            <input type="radio" class="btn-check" name="timerMode" id="custom" value="custom">
                            <label class="btn btn-outline-warning" for="custom">
                                <i class="bi bi-gear"></i> Custom
                            </label>
                        </div>
                    </div>

                    <!-- Timer Display -->
                    <div class="text-center mb-4">
                        <div class="display-1 fw-bold mb-3" id="timerDisplay">25:00</div>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="timerProgress" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>

                    <!-- Custom Time Input -->
                    <div id="customTimeInput" class="mb-4" style="display: none;">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Hours</label>
                                <input type="number" class="form-control" id="customHours" min="0" max="23" value="0">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Minutes</label>
                                <input type="number" class="form-control" id="customMinutes" min="0" max="59" value="25">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Seconds</label>
                                <input type="number" class="form-control" id="customSeconds" min="0" max="59" value="0">
                            </div>
                        </div>
                    </div>

                    <!-- Task Input -->
                    <div class="mb-4">
                        <label class="form-label">What are you working on?</label>
                        <input type="text" class="form-control" id="taskInput" placeholder="e.g., Study mathematics, Read chapter 5...">
                    </div>

                    <!-- Control Buttons -->
                    <div class="text-center mb-3">
                        <button class="btn btn-success btn-lg px-5 me-2" id="startBtn">
                            <i class="bi bi-play-fill"></i> Start
                        </button>
                        <button class="btn btn-warning btn-lg px-5 me-2" id="pauseBtn" style="display: none;">
                            <i class="bi bi-pause-fill"></i> Pause
                        </button>
                        <button class="btn btn-danger btn-lg px-5" id="resetBtn">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </button>
                    </div>

                    <!-- Settings -->
                    <div class="text-center">
                        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#settingsPanel">
                            <i class="bi bi-gear"></i> Settings
                        </button>
                    </div>

                    <div class="collapse mt-3" id="settingsPanel">
                        <div class="card card-body">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="autoStartBreaks" checked>
                                <label class="form-check-label" for="autoStartBreaks">
                                    Auto-start breaks
                                </label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="autoStartPomodoro">
                                <label class="form-check-label" for="autoStartPomodoro">
                                    Auto-start next pomodoro
                                </label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="soundNotifications" checked>
                                <label class="form-check-label" for="soundNotifications">
                                    Sound notifications
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="desktopNotifications">
                                <label class="form-check-label" for="desktopNotifications">
                                    Desktop notifications
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-graph-up"></i> Today's Statistics</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="p-3 border rounded">
                                <i class="bi bi-check-circle fs-2 text-success"></i>
                                <h3 class="mt-2 mb-0" id="completedPomodoros">0</h3>
                                <p class="text-muted mb-0">Completed</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="p-3 border rounded">
                                <i class="bi bi-clock fs-2 text-primary"></i>
                                <h3 class="mt-2 mb-0" id="totalTime">0h 0m</h3>
                                <p class="text-muted mb-0">Study Time</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="p-3 border rounded">
                                <i class="bi bi-cup-hot fs-2 text-warning"></i>
                                <h3 class="mt-2 mb-0" id="breaksTaken">0</h3>
                                <p class="text-muted mb-0">Breaks</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="p-3 border rounded">
                                <i class="bi bi-fire fs-2 text-danger"></i>
                                <h3 class="mt-2 mb-0" id="streak">0</h3>
                                <p class="text-muted mb-0">Day Streak</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Sessions -->
            <div class="card shadow mt-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="bi bi-list-task"></i> Recent Sessions</h5>
                </div>
                <div class="card-body">
                    <div class="list-group" id="recentSessions">
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Study mathematics</h6>
                                    <small class="text-muted">25 minutes • Completed 2 hours ago</small>
                                </div>
                                <span class="badge bg-success">Completed</span>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Read chapter 5</h6>
                                    <small class="text-muted">25 minutes • Completed 3 hours ago</small>
                                </div>
                                <span class="badge bg-success">Completed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
class StudyTimer {
    constructor() {
        this.timeLeft = 25 * 60;
        this.totalTime = 25 * 60;
        this.isRunning = false;
        this.interval = null;
        this.mode = 'pomodoro';
        this.completedPomodoros = 0;
        
        this.initializeElements();
        this.attachEventListeners();
        this.updateDisplay();
    }
    
    initializeElements() {
        this.display = document.getElementById('timerDisplay');
        this.progress = document.getElementById('timerProgress');
        this.startBtn = document.getElementById('startBtn');
        this.pauseBtn = document.getElementById('pauseBtn');
        this.resetBtn = document.getElementById('resetBtn');
        this.customTimeInput = document.getElementById('customTimeInput');
    }
    
    attachEventListeners() {
        this.startBtn.addEventListener('click', () => this.start());
        this.pauseBtn.addEventListener('click', () => this.pause());
        this.resetBtn.addEventListener('click', () => this.reset());
        
        document.querySelectorAll('input[name="timerMode"]').forEach(radio => {
            radio.addEventListener('change', (e) => this.changeMode(e.target.value));
        });
        
        document.getElementById('custom').addEventListener('change', () => {
            this.customTimeInput.style.display = 'block';
        });
        
        document.querySelectorAll('#customHours, #customMinutes, #customSeconds').forEach(input => {
            input.addEventListener('change', () => this.setCustomTime());
        });
    }
    
    changeMode(mode) {
        this.mode = mode;
        this.pause();
        
        if (mode === 'custom') {
            this.customTimeInput.style.display = 'block';
            this.setCustomTime();
        } else {
            this.customTimeInput.style.display = 'none';
            switch(mode) {
                case 'pomodoro':
                    this.timeLeft = this.totalTime = 25 * 60;
                    break;
                case 'short':
                    this.timeLeft = this.totalTime = 5 * 60;
                    break;
                case 'long':
                    this.timeLeft = this.totalTime = 15 * 60;
                    break;
            }
        }
        
        this.updateDisplay();
    }
    
    setCustomTime() {
        const hours = parseInt(document.getElementById('customHours').value) || 0;
        const minutes = parseInt(document.getElementById('customMinutes').value) || 0;
        const seconds = parseInt(document.getElementById('customSeconds').value) || 0;
        
        this.timeLeft = this.totalTime = (hours * 3600) + (minutes * 60) + seconds;
        this.updateDisplay();
    }
    
    start() {
        this.isRunning = true;
        this.startBtn.style.display = 'none';
        this.pauseBtn.style.display = 'inline-block';
        
        this.interval = setInterval(() => {
            this.timeLeft--;
            this.updateDisplay();
            
            if (this.timeLeft <= 0) {
                this.complete();
            }
        }, 1000);
    }
    
    pause() {
        this.isRunning = false;
        this.startBtn.style.display = 'inline-block';
        this.pauseBtn.style.display = 'none';
        clearInterval(this.interval);
    }
    
    reset() {
        this.pause();
        this.changeMode(this.mode);
    }
    
    complete() {
        this.pause();
        
        if (this.mode === 'pomodoro') {
            this.completedPomodoros++;
            document.getElementById('completedPomodoros').textContent = this.completedPomodoros;
        }
        
        if (document.getElementById('soundNotifications').checked) {
            this.playSound();
        }
        
        if (document.getElementById('desktopNotifications').checked) {
            this.showNotification();
        }
        
        alert('Timer completed! Great work!');
    }
    
    updateDisplay() {
        const hours = Math.floor(this.timeLeft / 3600);
        const minutes = Math.floor((this.timeLeft % 3600) / 60);
        const seconds = this.timeLeft % 60;
        
        let displayText = '';
        if (hours > 0) {
            displayText = `${hours}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        } else {
            displayText = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }
        
        this.display.textContent = displayText;
        
        const progressPercent = ((this.totalTime - this.timeLeft) / this.totalTime) * 100;
        this.progress.style.width = progressPercent + '%';
    }
    
    playSound() {
        // Play notification sound
        const audio = new Audio('data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2/LDciUFLIHO8tiJNwgZaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmwhBSuBzvLZiTYIG2m98OScTgwPUKnk76JgGwU7k9n0yHcpByJ2x+/glEILElyx6OyrWBUIR6Dg8r1qIAUrlM3y2Ik2CBxqvvDjnE4MD1Cp5O+jYBoEO5Pa9MhzKAcicMfw4JNCC');
        audio.play();
    }
    
    showNotification() {
        if (Notification.permission === 'granted') {
            new Notification('Timer Complete!', {
                body: 'Great work! Time for a break.',
                icon: '/assets/images/timer-icon.png'
            });
        } else if (Notification.permission === 'default') {
            Notification.requestPermission().then(permission => {
                if (permission === 'granted') {
                    new Notification('Timer Complete!', {
                        body: 'Great work! Time for a break.',
                        icon: '/assets/images/timer-icon.png'
                    });
                }
            });
        }
        }
    }


// Initialize timer
const timer = new StudyTimer();

// Request notification permission
document.getElementById('desktopNotifications').addEventListener('change', function() {
    if (this.checked && Notification.permission === 'default') {
        Notification.requestPermission();
    }
});
</script>

<?php
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
