<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? $title : 'RS Sehat'; ?></title>
    
    <!-- Bootstrap 3 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fc;
            padding-top: 60px;
        }
        
        /* Global Card Style */
        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.06);
            border: none;
            transition: 0.3s;
        }
        .card:hover {
            box-shadow: 0 10px 35px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        
        /* Toast Notification */
        .toast-container {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 9999;
        }
        .toast {
            padding: 15px 25px;
            border-radius: 12px;
            color: white;
            font-weight: 500;
            margin-bottom: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            animation: slideInRight 0.5s ease;
            display: flex;
            align-items: center;
        }
        .toast i {
            margin-right: 12px;
            font-size: 20px;
        }
        .toast-success { background: linear-gradient(135deg, #28a745, #20c997); }
        .toast-error { background: linear-gradient(135deg, #dc3545, #e74c6f); }
        .toast-warning { background: linear-gradient(135deg, #f0ad4e, #f7c948); }
        .toast-info { background: linear-gradient(135deg, #1a8a8a, #2cbbbb); }
        
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* Loading Spinner */
        .spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid rgba(26, 138, 138, 0.1);
            border-top: 4px solid #1a8a8a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Chart Container */
        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Toast Container -->
<div class="toast-container" id="toastContainer"></div>