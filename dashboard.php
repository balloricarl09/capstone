<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Awesome Dashboard</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            background-color: #DDDBDE;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .d-flex {
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 300px;
            flex-shrink: 0;
            height: 100vh;
            overflow-y: auto;
            background-color: #3B373B;
            color: #CAD4DF;
            transition: all 0.3s;
        }
        .sidebar a {
            color: #CAD4DF;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            transition: background 0.2s ease-in-out;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #656E77;
            color: white;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .sidebar .nav-item {
            margin-bottom: 10px;
        }
        .sidebar-header {
            padding: 20px;
            font-size: 1.4rem;
            font-weight: bold;
            color: white;
        }
        .content {
            flex-grow: 1;
            overflow-y: auto;
            height: 100vh;
            padding: 30px;
            background-color: #DDDBDE;
        }
        .dashboard-card {
            background-color: white;
            border-radius: 10px;
            height: 100px;
        }
        .card-icon {
            font-size: 2rem;
            margin-right: 15px;
        }
        .card-title {
            font-weight: 600;
            color: #656E77;
        }
        .metric-value {
            font-size: 1.25rem;
            font-weight: bold;
            color: #3B373B;
        }
        .section-title {
            font-weight: bold;
            color: #3B373B;
        }

        /* 🎨 Bonus: Custom scrollbars */
        .content::-webkit-scrollbar {
            width: 8px;
        }
        .content::-webkit-scrollbar-thumb {
            background-color: #CAD4DF;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <div class="sidebar-header text-center">
            <i class="fas fa-user-cog me-2"></i>Dashboard
        </div>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a href="#" class="active"><i class="fas fa-chart-line"></i> Overview</a>
            </li>
            <li class="nav-item">
                <a href="products.php"><i class="fas fa-box-open"></i> Products</a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-users"></i> Customers</a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-receipt"></i> Orders</a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-cogs"></i> Settings</a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container py-4">
            <h2 class="section-title mb-4">📊 Dashboard Overview</h2>
            <div class="row g-3">
                <!-- Cards -->
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="card-icon">🥩</div>
                            <div>
                                <div class="card-title">Total Products in Stock</div>
                                <div class="metric-value">1,230 kg</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="card-icon">📦</div>
                            <div>
                                <div class="card-title">Total Active Batches</div>
                                <div class="metric-value">57</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="card-icon">⏳</div>
                            <div>
                                <div class="card-title">Batches Near Expiry</div>
                                <div class="metric-value">8</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="card-icon">⚠️</div>
                            <div>
                                <div class="card-title">Low Stock Items</div>
                                <div class="metric-value">12</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="card-icon">💰</div>
                            <div>
                                <div class="card-title">Today's Sales</div>
                                <div class="metric-value">₱18,950.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="card-icon">📈</div>
                            <div>
                                <div class="card-title">Forecast Accuracy</div>
                                <div class="metric-value">92%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🚨 Stock Alerts -->
            <h3 class="section-title mt-5 mb-3">🚨 Stock Alerts</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle" style="background-color: #CAD4DF; color: #3B373B;">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Alert Type</th>
                            <th>Quantity</th>
                            <th>Expiration</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ground Beef</td>
                            <td><span class="badge bg-danger">Low Stock</span></td>
                            <td>2.5 kg</td>
                            <td>-</td>
                            <td>Critical</td>
                        </tr>
                        <tr>
                            <td>Pork Shoulder</td>
                            <td><span class="badge bg-warning text-dark">Expiring Soon</span></td>
                            <td>5 kg</td>
                            <td>Aug 10, 2025</td>
                            <td>Needs Action</td>
                        </tr>
                        <tr>
                            <td>Chicken Wings</td>
                            <td><span class="badge bg-secondary">Expired</span></td>
                            <td>1.2 kg</td>
                            <td>Aug 5, 2025</td>
                            <td>Expired</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- 📈 Sales Trend -->
            <h3 class="section-title mt-5 mb-3">📈 Sales Trends (Last 7 Days)</h3>
            <canvas id="salesTrendChart" height="100"></canvas>

            <!-- 📊 Forecast vs Actual Sales -->
            <h3 class="section-title mt-5 mb-3">📊 Forecast vs Actual Sales</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle" style="background-color: #CAD4DF; color: #3B373B;">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Forecast Qty</th>
                            <th>Actual Qty</th>
                            <th>Error Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Aug 6, 2025</td>
                            <td>Chicken Breast</td>
                            <td>12.0 kg</td>
                            <td>10.5 kg</td>
                            <td>12.5%</td>
                        </tr>
                        <tr>
                            <td>Aug 6, 2025</td>
                            <td>Beef Ribs</td>
                            <td>8.0 kg</td>
                            <td>8.2 kg</td>
                            <td>2.5%</td>
                        </tr>
                        <tr>
                            <td>Aug 6, 2025</td>
                            <td>Pork Belly</td>
                            <td>9.5 kg</td>
                            <td>8.0 kg</td>
                            <td>15.8%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script>
    const ctx = document.getElementById('salesTrendChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Aug 1', 'Aug 2', 'Aug 3', 'Aug 4', 'Aug 5', 'Aug 6', 'Aug 7'],
            datasets: [{
                label: 'Sales (₱)',
                data: [15000, 17000, 14000, 18500, 19000, 20000, 18950],
                borderColor: '#656E77',
                backgroundColor: '#CAD4DF',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
