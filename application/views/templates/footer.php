    <!-- jQuery (HARUS PERTAMA) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 3 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
    // Toast Notification
    function showToast(message, type = 'info') {
        var icons = {
            success: 'fa-check-circle',
            error: 'fa-times-circle',
            warning: 'fa-exclamation-triangle',
            info: 'fa-info-circle'
        };
        var toast = $('<div class="toast toast-' + type + '"><i class="fa ' + icons[type] + '"></i> ' + message + '</div>');
        $('#toastContainer').append(toast);
        setTimeout(function() {
            toast.fadeOut(500, function() { $(this).remove(); });
        }, 4000);
    }
    
    // Flash messages dari session
    <?php if ($this->session->flashdata('success')): ?>
    $(document).ready(function() {
        showToast('<?= $this->session->flashdata('success'); ?>', 'success');
    });
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('error')): ?>
    $(document).ready(function() {
        showToast('<?= $this->session->flashdata('error'); ?>', 'error');
    });
    <?php endif; ?>
    
    // SweetAlert untuk konfirmasi delete
    function confirmDelete(url, message = 'Yakin ingin menghapus data ini?') {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
    
    // SweetAlert untuk konfirmasi setujui/tolak
    function confirmAction(url, title, text, icon, confirmColor) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: confirmColor,
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Lanjutkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // ===== CHART UNTUK LAPORAN =====
    <?php if (isset($page) && $page == 'laporan'): ?>
    $(document).ready(function() {
        // Data dari PHP
        var total = <?= isset($statistik['total']) ? $statistik['total'] : 0; ?>;
        var pending = <?= isset($statistik['pending']) ? $statistik['pending'] : 0; ?>;
        var disetujui = <?= isset($statistik['disetujui']) ? $statistik['disetujui'] : 0; ?>;
        var ditolak = <?= isset($statistik['ditolak']) ? $statistik['ditolak'] : 0; ?>;

        // DataTable
        if ($.fn.DataTable) {
            $('#tabelLaporan').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                },
                order: [[4, 'desc']]
            });
        }

        // Chart Pie
        var ctxPie = document.getElementById('chartPie');
        if (ctxPie && typeof Chart !== 'undefined') {
            new Chart(ctxPie.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Pending (' + pending + ')', 'Disetujui (' + disetujui + ')', 'Ditolak (' + ditolak + ')'],
                    datasets: [{
                        data: [pending, disetujui, ditolak],
                        backgroundColor: ['#f0ad4e', '#5cb85c', '#d9534f'],
                        borderWidth: 3,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                usePointStyle: true,
                                font: { size: 12 }
                            }
                        }
                    },
                    cutout: '60%'
                }
            });
        }

        // Chart Bar
        var ctxBar = document.getElementById('chartBar');
        if (ctxBar && typeof Chart !== 'undefined') {
            new Chart(ctxBar.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Total', 'Pending', 'Disetujui', 'Ditolak'],
                    datasets: [{
                        label: 'Jumlah Pendaftaran',
                        data: [total, pending, disetujui, ditolak],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(255, 99, 132, 0.8)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1, font: { size: 11 } },
                            grid: { color: 'rgba(0,0,0,0.05)' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        }
    });
    <?php endif; ?>
    </script>
</body>
</html>