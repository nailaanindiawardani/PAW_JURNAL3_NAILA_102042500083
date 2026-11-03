<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Beranda'); ?> &mdash; CeLOE LMS Telkom University</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>?v=1">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>?v=1">
    <style>
        :root {
            --tel-red: #b91c1c;
            --tel-red-dark: #991b1b;
            --tel-red-darker: #7f1d1d;
            --tel-red-light: #fef2f2;
            --tel-red-border: #fecaca;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
            --success-bg: #ecfdf5;
            --success-text: #065f46;
            --success-border: #a7f3d0;
            --warning-bg: #fffbeb;
            --warning-text: #92400e;
            --warning-border: #fde68a;
            --danger-bg: #fef2f2;
            --danger-text: #991b1b;
            --danger-border: #fecaca;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f1f5f9;
            color: var(--slate-800);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* App Layout Container */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Portal */
        .portal-sidebar {
            width: 280px;
            background-color: var(--slate-900);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            z-index: 50;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            background-color: var(--slate-900);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand-text h1 {
            font-size: 1.125rem;
            font-weight: 800;
            letter-spacing: -0.01em;
            color: #ffffff;
            line-height: 1.2;
        }

        .brand-text span {
            font-size: 0.75rem;
            color: #f87171;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .sidebar-nav {
            padding: 1.25rem 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.375rem;
            flex: 1;
            overflow-y: auto;
        }

        .nav-section-title {
            font-size: 0.6875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--slate-500);
            padding: 0.5rem 0.75rem;
            margin-top: 0.5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.875rem;
            border-radius: var(--radius-md);
            color: var(--slate-400);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.06);
        }

        .sidebar-link.active {
            color: #ffffff;
            background-color: var(--tel-red);
            font-weight: 600;
        }

        .sidebar-user {
            padding: 1rem 1.25rem;
            background-color: rgba(0, 0, 0, 0.25);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .user-profile-badge {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .user-avatar {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 9999px;
            background: linear-gradient(135deg, var(--slate-700), var(--slate-600));
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            flex-shrink: 0;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .user-details {
            overflow: hidden;
            flex: 1;
        }

        .user-name-text {
            font-size: 0.875rem;
            font-weight: 600;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-subtext {
            font-size: 0.75rem;
            color: var(--slate-400);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-sidebar-logout {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fca5a5;
            padding: 0.4375rem;
            border-radius: var(--radius-md);
            font-size: 0.8125rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
        }

        .btn-sidebar-logout:hover {
            background-color: var(--tel-red);
            color: #ffffff;
            border-color: var(--tel-red);
        }

        /* Main Workspace */
        .portal-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* Top Bar */
        .portal-topbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--slate-200);
            padding: 0.875rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            box-shadow: var(--shadow-sm);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar-date {
            font-size: 0.8125rem;
            color: var(--slate-500);
        }

        /* Main Content Container */
        .portal-content {
            padding: 2rem;
            flex: 1;
            max-width: 1300px;
            width: 100%;
            margin: 0 auto;
        }

        /* Alerts */
        .alert {
            padding: 0.875rem 1.25rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: var(--success-bg);
            color: var(--success-text);
            border-color: var(--success-border);
        }

        .alert-danger {
            background-color: var(--danger-bg);
            color: var(--danger-text);
            border-color: var(--danger-border);
        }

        .alert ul {
            margin-left: 1.25rem;
            margin-top: 0.25rem;
        }

        /* Card Component */
        .card {
            background-color: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--slate-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            background-color: #ffffff;
        }

        .card-title {
            font-size: 1.1875rem;
            font-weight: 700;
            color: var(--slate-900);
            letter-spacing: -0.01em;
        }

        .card-subtitle {
            font-size: 0.8125rem;
            color: var(--slate-500);
            margin-top: 0.125rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: var(--radius-md);
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.15s ease;
        }

        .btn-primary {
            background-color: var(--tel-red);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: var(--tel-red-dark);
            color: #ffffff;
        }

        .btn-secondary {
            background-color: #ffffff;
            border-color: var(--slate-300);
            color: var(--slate-700);
        }

        .btn-secondary:hover {
            background-color: var(--slate-100);
            color: var(--slate-900);
        }

        .btn-danger {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .btn-sm {
            padding: 0.25rem 0.625rem;
            font-size: 0.75rem;
            border-radius: var(--radius-sm);
        }

        /* Text Badges & Labels (Flat, No Background, No Pill Borders) */
        .badge {
            display: inline-block;
            font-size: 0.8125rem;
            font-weight: 500;
            color: var(--slate-600);
            background: none;
            border: none;
            padding: 0;
            white-space: nowrap;
        }

        .badge-red {
            color: var(--tel-red);
            background: none;
            border: none;
        }

        .badge-slate {
            color: var(--slate-600);
            background: none;
            border: none;
        }

        .badge-green {
            color: #059669;
            background: none;
            border: none;
        }

        .badge-amber {
            color: #d97706;
            background: none;
            border: none;
        }

        .code-pill {
            font-family: inherit;
            color: var(--slate-800);
            font-size: 0.875rem;
            font-weight: 700;
            background: none;
            border: none;
            padding: 0;
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--slate-700);
            margin-bottom: 0.375rem;
        }

        .form-label .required-indicator {
            color: #ef4444;
        }

        .form-control {
            width: 100%;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            color: var(--slate-900);
            background-color: #ffffff;
            border: 1px solid var(--slate-300);
            border-radius: var(--radius-md);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--tel-red);
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.15);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .form-help {
            font-size: 0.8125rem;
            color: var(--slate-500);
            margin-top: 0.25rem;
        }

        .invalid-feedback {
            font-size: 0.8125rem;
            color: #ef4444;
            margin-top: 0.25rem;
        }

        /* Tables */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
            text-align: left;
        }

        .table th {
            background-color: var(--slate-50);
            color: var(--slate-600);
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--slate-200);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .table td {
            padding: 0.875rem 1rem;
            border-bottom: 1px solid var(--slate-200);
            color: var(--slate-700);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #fbfcfe;
        }
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body spellcheck="false">
    <?php if(auth()->guard()->check()): ?>
    <?php
        $sidebarCourses = Auth::user()->isDosen()
            ? Auth::user()->taughtCourses()->orderBy('kode_mk')->get()
            : Auth::user()->enrolledCourses()->orderBy('kode_mk')->get();
    ?>
    <div class="app-wrapper">
        <!-- Sidebar Navigation -->
        <aside class="portal-sidebar">
            <div class="sidebar-brand">
                <div class="brand-text">
                    <h1>CeLOE LMS</h1>
                    <span>Telkom University</span>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section-title">Menu Utama</div>

                <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                    <span>Dashboard</span>
                </a>

                <a href="<?php echo e(route('courses.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('courses.index') ? 'active' : ''); ?>">
                    <span><?php echo e(Auth::user()->isDosen() ? 'Kelola Semua Kelas' : 'Katalog Mata Kuliah'); ?></span>
                </a>

                <div class="nav-section-title" style="margin-top: 1rem;">
                    <?php echo e(Auth::user()->isDosen() ? 'Mata Kuliah Diampu' : 'Mata Kuliah Saya'); ?>

                </div>

                <?php $__empty_1 = true; $__currentLoopData = $sidebarCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sbCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $isCurrentCourse = request()->routeIs('courses.show') && (
                            (is_object(request()->route('course')) ? request()->route('course')->id : request()->route('course')) == $sbCourse->id
                        );
                    ?>
                    <a href="<?php echo e(route('courses.show', $sbCourse->id)); ?>" 
                       class="sidebar-link <?php echo e($isCurrentCourse ? 'active' : ''); ?>" 
                       title="<?php echo e($sbCourse->kode_mk); ?> — <?php echo e($sbCourse->nama_mk); ?>"
                       style="padding: 0.5rem 0.875rem; font-size: 0.8125rem;">
                        <span style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block;">
                            <strong style="color: <?php echo e($isCurrentCourse ? '#ffffff' : '#f87171'); ?>; font-weight: 700;"><?php echo e($sbCourse->kode_mk); ?></strong> &bull; <?php echo e($sbCourse->nama_mk); ?>

                        </span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="padding: 0.5rem 0.875rem; font-size: 0.75rem; color: #64748b; font-style: italic;">
                        Belum ada mata kuliah
                    </div>
                <?php endif; ?>

                <?php if(Auth::user()->isDosen()): ?>
                <div class="nav-section-title" style="margin-top: 1rem;">Manajemen Perkuliahan</div>

                <a href="<?php echo e(route('courses.create')); ?>" class="sidebar-link <?php echo e(request()->routeIs('courses.create') ? 'active' : ''); ?>">
                    <span>+ Buat Mata Kuliah Baru</span>
                </a>
                <?php endif; ?>
            </nav>

            <div class="sidebar-user">
                <a href="<?php echo e(route('profile.edit')); ?>" class="user-profile-badge" style="text-decoration: none; color: inherit; display: flex;">
                    <div class="user-avatar">
                        <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                    </div>
                    <div class="user-details">
                        <div class="user-name-text"><?php echo e(Auth::user()->name); ?></div>
                        <div class="user-subtext">
                            <?php if(Auth::user()->nomor_induk): ?>
                                <?php echo e(Auth::user()->nomor_induk); ?> &bull;
                            <?php endif; ?>
                            <span style="text-transform: capitalize; color: #fca5a5;"><?php echo e(Auth::user()->role); ?></span>
                        </div>
                    </div>
                </a>

                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-sidebar-logout">
                        <span>Keluar dari Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="portal-main">
            <header class="portal-topbar">
                <div class="topbar-left">
                    <span class="topbar-date"><?php echo e(now()->translatedFormat('l, d F Y')); ?></span>
                </div>
                <div>
                    <a href="<?php echo e(route('profile.edit')); ?>" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.375rem 0.75rem; border: 1px solid var(--slate-200); border-radius: var(--radius-md); background-color: #ffffff; color: var(--slate-800); text-decoration: none; font-size: 0.8125rem; font-weight: 600; transition: all 0.15s ease;">
                        <span><?php echo e(Auth::user()->name); ?></span>
                    </a>
                </div>
            </header>

            <main class="portal-content">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <div><?php echo e(session('success')); ?></div>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <div><?php echo e(session('error')); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <div>
                            <strong>Perhatian:</strong> Terdapat kesalahan input formulir:
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    <?php else: ?>
    <!-- Guest Layout (e.g. Login) -->
    <div style="min-height: 100vh; display: flex; flex-direction: column;">
        <main style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 2rem 1rem;">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\PAW_JURNAL 3_ANISA_102042530018\resources\views/layouts/app.blade.php ENDPATH**/ ?>