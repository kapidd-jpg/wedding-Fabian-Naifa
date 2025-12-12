<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Guest Check-In Scanner</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .scanner-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
            font-size: 2rem;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        input[type="text"] {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 10px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #f8f9ff;
        }

        .result-box {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            display: none;
        }

        .result-box.success {
            background: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
            display: block;
        }

        .result-box.error {
            background: #f8d7da;
            border: 2px solid #dc3545;
            color: #721c24;
            display: block;
        }

        .result-box.warning {
            background: #fff3cd;
            border: 2px solid #ffc107;
            color: #856404;
            display: block;
        }

        .guest-info {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: 600;
        }

        .info-value {
            text-align: right;
        }

        .loading {
            display: none;
            text-align: center;
            margin: 20px 0;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .history {
            margin-top: 30px;
        }

        .history-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        .history-item {
            background: #f8f9fa;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .history-name {
            font-weight: 500;
        }

        .history-time {
            font-size: 0.85rem;
            color: #666;
        }

        @media (max-width: 576px) {
            .scanner-container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="scanner-container">
        <h1>🎉 Guest Check-In</h1>
        <p class="subtitle">Scan or enter guest code to check them in</p>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number" id="totalCheckins">0</div>
                <div class="stat-label">Total Check-ins</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="sessionCheckins">0</div>
                <div class="stat-label">This Session</div>
            </div>
        </div>

        <form id="checkinForm">
            <div class="input-group">
                <label for="guestCode">Guest Code</label>
                <input 
                    type="text" 
                    id="guestCode" 
                    placeholder="Enter or scan guest code (e.g., ABC123)" 
                    required
                    autocomplete="off"
                    autofocus
                >
            </div>

            <button type="submit" class="btn">Check In Guest</button>
            <button type="button" class="btn btn-secondary" onclick="clearForm()">Clear</button>
        </form>

        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p style="margin-top: 10px; color: #666;">Processing...</p>
        </div>

        <div id="resultBox" class="result-box"></div>

        <div class="history" id="historySection" style="display: none;">
            <div class="history-title">Recent Check-ins</div>
            <div id="historyList"></div>
        </div>
    </div>

    <script>
        let sessionCheckins = 0;
        let checkinHistory = [];
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Load stats on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadStats();
        });

        // Form submission
        document.getElementById('checkinForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const code = document.getElementById('guestCode').value.trim().toUpperCase();
            const loading = document.getElementById('loading');
            const resultBox = document.getElementById('resultBox');
            
            if (!code) return;

            // Show loading
            loading.classList.add('active');
            resultBox.style.display = 'none';

            try {
                const response = await fetch(`/checkin/${code}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                const data = await response.json();
                
                // Hide loading
                loading.classList.remove('active');

                // Show result
                if (data.success) {
                    showResult('success', `
                        <strong>✅ Check-in Successful!</strong>
                        <div class="guest-info">
                            <div class="info-row">
                                <span class="info-label">Guest Name:</span>
                                <span class="info-value">${data.guest.name}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Code:</span>
                                <span class="info-value">${data.guest.code}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Quota:</span>
                                <span class="info-value">${data.guest.quota} guest(s)</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Time:</span>
                                <span class="info-value">${new Date().toLocaleTimeString()}</span>
                            </div>
                        </div>
                    `);

                    // Update stats
                    sessionCheckins++;
                    document.getElementById('sessionCheckins').textContent = sessionCheckins;
                    
                    // Add to history
                    addToHistory(data.guest.name, data.guest.code);
                    
                    // Load total stats
                    loadStats();

                    // Clear form
                    document.getElementById('guestCode').value = '';
                    document.getElementById('guestCode').focus();
                } else {
                    showResult('warning', `
                        <strong>⚠️ ${data.message}</strong>
                        ${data.guest ? `
                            <div class="guest-info">
                                <div class="info-row">
                                    <span class="info-label">Guest Name:</span>
                                    <span class="info-value">${data.guest.name}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Already checked in at:</span>
                                    <span class="info-value">${data.checkin ? new Date(data.checkin.checked_in_at).toLocaleString() : 'N/A'}</span>
                                </div>
                            </div>
                        ` : ''}
                    `);
                }
            } catch (error) {
                loading.classList.remove('active');
                showResult('error', `
                    <strong>❌ Error</strong>
                    <p>Guest not found or invalid code. Please check the code and try again.</p>
                `);
                console.error('Error:', error);
            }
        });

        function showResult(type, message) {
            const resultBox = document.getElementById('resultBox');
            resultBox.className = `result-box ${type}`;
            resultBox.innerHTML = message;
        }

        function clearForm() {
            document.getElementById('guestCode').value = '';
            document.getElementById('resultBox').style.display = 'none';
            document.getElementById('guestCode').focus();
        }

        function addToHistory(name, code) {
            checkinHistory.unshift({
                name: name,
                code: code,
                time: new Date()
            });

            // Keep only last 5
            if (checkinHistory.length > 5) {
                checkinHistory.pop();
            }

            updateHistoryDisplay();
        }

        function updateHistoryDisplay() {
            const historySection = document.getElementById('historySection');
            const historyList = document.getElementById('historyList');

            if (checkinHistory.length > 0) {
                historySection.style.display = 'block';
                historyList.innerHTML = checkinHistory.map(item => `
                    <div class="history-item">
                        <div>
                            <div class="history-name">${item.name}</div>
                            <div class="history-time">${item.code}</div>
                        </div>
                        <div class="history-time">${item.time.toLocaleTimeString()}</div>
                    </div>
                `).join('');
            }
        }

        async function loadStats() {
            // In real implementation, this would fetch from backend
            // For now, we'll just keep the session count
            document.getElementById('totalCheckins').textContent = sessionCheckins;
        }

        // Auto-focus on input when clicking anywhere
        document.addEventListener('click', function(e) {
            if (!e.target.closest('button') && !e.target.closest('input')) {
                document.getElementById('guestCode').focus();
            }
        });
    </script>
</body>
</html>