<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.9;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%);
            color: white;
        }

        .stat-icon.red {
            background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
            color: white;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.95rem;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
        }

        .badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .badge.success {
            background: #d4edda;
            color: #155724;
        }

        .badge.danger {
            background: #f8d7da;
            color: #721c24;
        }

        .badge.info {
            background: #d1ecf1;
            color: #0c5460;
        }

        .list-item {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.2s ease;
        }

        .list-item:hover {
            background: #f8f9fa;
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .item-detail {
            font-size: 0.85rem;
            color: #666;
        }

        .item-time {
            font-size: 0.85rem;
            color: #999;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8f9fa;
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #e0e0e0;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
        }

        .status-indicator.green {
            background: #28a745;
        }

        .status-indicator.red {
            background: #dc3545;
        }

        .status-indicator.gray {
            background: #6c757d;
        }

        .quick-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #f8f9ff;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #999;
        }

        @media (max-width: 992px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <h1>💒 Wedding Dashboard</h1>
            <p>Fabian & Naifa Wedding Management</p>
        </div>
    </div>

    <div class="container">
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon purple">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ $totalGuests }}</div>
                <div class="stat-label">Total Guests</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-number">{{ $attendingGuests }}</div>
                <div class="stat-label">Attending</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon red">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-number">{{ $notAttendingGuests }}</div>
                <div class="stat-label">Not Attending</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-qrcode"></i>
                </div>
                <div class="stat-number">{{ $totalCheckins }}</div>
                <div class="stat-label">Checked In</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-number">{{ $totalRsvps }}</div>
                <div class="stat-label">Total RSVPs</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon purple">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="stat-number">{{ $totalWishes }}</div>
                <div class="stat-label">Wishes Received</div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="content-grid">
            <!-- Recent RSVPs -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Recent RSVPs</h2>
                </div>
                @if($recentRsvps->count() > 0)
                    @foreach($recentRsvps as $rsvp)
                    <div class="list-item">
                        <div class="item-info">
                            <div class="item-name">{{ $rsvp->guest->name }}</div>
                            <div class="item-detail">
                                <span class="badge {{ $rsvp->attendance == 'attending' ? 'success' : 'danger' }}">
                                    {{ ucfirst(str_replace('_', ' ', $rsvp->attendance)) }}
                                </span>
                                • {{ $rsvp->total_guests }} guest(s)
                            </div>
                        </div>
                        <div class="item-time">{{ $rsvp->created_at->diffForHumans() }}</div>
                    </div>
                    @endforeach
                @else
                    <div class="empty-state">No RSVPs yet</div>
                @endif
            </div>

            <!-- Recent Check-ins -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Recent Check-ins</h2>
                </div>
                @if($recentCheckins->count() > 0)
                    @foreach($recentCheckins as $checkin)
                    <div class="list-item">
                        <div class="item-info">
                            <div class="item-name">{{ $checkin->guest->name }}</div>
                            <div class="item-detail">Code: {{ $checkin->guest->code }}</div>
                        </div>
                        <div class="item-time">{{ $checkin->checked_in_at->diffForHumans() }}</div>
                    </div>
                    @endforeach
                @else
                    <div class="empty-state">No check-ins yet</div>
                @endif
            </div>
        </div>

        <!-- Recent Wishes -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Recent Wishes</h2>
            </div>
            @if($recentWishes->count() > 0)
                @foreach($recentWishes as $wish)
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-name">{{ $wish->name }}</div>
                        <div class="item-detail">{{ Str::limit($wish->message, 100) }}</div>
                    </div>
                    <div class="item-time">{{ $wish->created_at->diffForHumans() }}</div>
                </div>
                @endforeach
            @else
                <div class="empty-state">No wishes yet</div>
            @endif
        </div>

        <!-- All Guests Table -->
        <div class="table-container">
            <div class="card-header">
                <h2 class="card-title">All Guests</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Quota</th>
                        <th>RSVP Status</th>
                        <th>Check-in</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guests as $guest)
                    <tr>
                        <td><strong>{{ $guest->name }}</strong></td>
                        <td><code>{{ $guest->code }}</code></td>
                        <td>{{ $guest->email ?? '-' }}</td>
                        <td>{{ $guest->phone ?? '-' }}</td>
                        <td>{{ $guest->quota }}</td>
                        <td>
                            @if($guest->rsvp)
                                <span class="status-indicator {{ $guest->rsvp->attendance == 'attending' ? 'green' : 'red' }}"></span>
                                {{ ucfirst(str_replace('_', ' ', $guest->rsvp->attendance)) }}
                                ({{ $guest->rsvp->total_guests }})
                            @else
                                <span class="status-indicator gray"></span>
                                No response
                            @endif
                        </td>
                        <td>
                            @if($guest->checkins->count() > 0)
                                <span class="status-indicator green"></span>
                                Checked in
                            @else
                                <span class="status-indicator gray"></span>
                                Not checked in
                            @endif
                        </td>
                        <td>
                            <a href="/invitation/{{ $guest->code }}" target="_blank" class="btn btn-secondary" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="/checkin/scanner" class="btn btn-primary">
                <i class="fas fa-qrcode"></i> Open Scanner
            </a>
            <a href="/" class="btn btn-secondary">
                <i class="fas fa-home"></i> Back to Home
            </a>
        </div>
    </div>
</body>
</html>