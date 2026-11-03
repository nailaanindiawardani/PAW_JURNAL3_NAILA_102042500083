<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- Sapaan Dashboard Ringkas -->
<div style="margin-bottom: 2rem;">
    <h1 style="font-size: 1.625rem; font-weight: 700; color: var(--slate-900); margin: 0 0 0.375rem 0; letter-spacing: -0.01em;">
        Selamat Datang, <?php echo e(Auth::user()->name); ?>

    </h1>
    <p style="color: var(--slate-500); font-size: 0.875rem; margin: 0;">
        Ringkasan pembelajaran CeLOE LMS Telkom University &bull; Semester Ganjil 2026/2027
    </p>
</div>

<!-- Ringkasan Statistik Flat -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
    <?php if(Auth::user()->isDosen()): ?>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Mata Kuliah Diampu
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: var(--slate-900);">
                <?php echo e($stats['total_courses'] ?? 0); ?>

            </div>
        </div>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Mahasiswa Aktif
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: var(--slate-900);">
                <?php echo e($stats['total_students'] ?? 0); ?>

            </div>
        </div>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Menunggu Persetujuan
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: <?php echo e(($stats['pending_approvals'] ?? 0) > 0 ? 'var(--tel-red)' : 'var(--slate-900)'); ?>;">
                <?php echo e($stats['pending_approvals'] ?? 0); ?>

            </div>
        </div>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Total Materi &amp; Tugas
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: var(--slate-900);">
                <?php echo e(($stats['total_materials'] ?? 0) + ($stats['total_assignments'] ?? 0)); ?>

            </div>
        </div>
    <?php else: ?>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Mata Kuliah Diikuti
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: var(--slate-900);">
                <?php echo e($stats['enrolled_courses'] ?? 0); ?>

            </div>
        </div>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Total Materi
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: var(--slate-900);">
                <?php echo e($stats['total_materials'] ?? 0); ?>

            </div>
        </div>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Total Tugas
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: var(--slate-900);">
                <?php echo e($stats['total_assignments'] ?? 0); ?>

            </div>
        </div>
        <div class="card" style="margin: 0; padding: 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--slate-500); margin-bottom: 0.5rem;">
                Tugas Dikumpulkan
            </div>
            <div style="font-size: 1.75rem; font-weight: 700; color: var(--slate-900);">
                <?php echo e($stats['submitted_count'] ?? 0); ?>

            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Layout Dua Kolom -->
<div style="display: grid; grid-template-columns: 2fr 1.2fr; gap: 1.5rem; align-items: start;">
    <!-- Kolom Kiri: Daftar Mata Kuliah -->
    <div>
        <div class="card" style="margin-bottom: 1.5rem;">
            <div class="card-header" style="border-bottom: 1px solid var(--slate-200); padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 class="card-title" style="margin: 0; font-size: 1.125rem;">
                        <?php echo e(Auth::user()->isMahasiswa() ? 'Mata Kuliah Saya' : 'Mata Kuliah yang Diampu'); ?>

                    </h2>
                    <div class="card-subtitle">
                        <?php echo e($courses->count()); ?> mata kuliah terdaftar pada akun Anda
                    </div>
                </div>
                <?php if(Auth::user()->isDosen()): ?>
                    <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-primary btn-sm">
                        + Tambah Mata Kuliah
                    </a>
                <?php elseif(Auth::user()->isMahasiswa()): ?>
                    <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-secondary btn-sm" style="color: var(--tel-red); font-weight: 600;">
                        Jelajahi Katalog &rarr;
                    </a>
                <?php endif; ?>
            </div>

            <div style="padding: 0 1.5rem;">
                <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div style="padding: 1rem 0; border-bottom: 1px solid var(--slate-200); display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 200px;">
                            <a href="<?php echo e(route('courses.show', $course->id)); ?>" style="color: var(--slate-900); font-weight: 600; text-decoration: none; font-size: 0.9375rem; display: block; margin-bottom: 0.25rem;">
                                <?php echo e($course->nama_mk); ?>

                            </a>
                            <div style="font-size: 0.8125rem; color: var(--slate-500);">
                                <span style="font-weight: 500; color: var(--slate-700);"><?php echo e($course->kode_mk); ?></span>
                                &bull; <?php echo e($course->sks); ?> SKS
                                &bull; <?php echo e($course->dosen->name ?? 'Dosen Belum Ditentukan'); ?>

                            </div>
                            <div style="font-size: 0.75rem; color: var(--slate-400); margin-top: 0.25rem;">
                                <?php echo e($course->materials_count ?? $course->materials->count()); ?> materi &bull; <?php echo e($course->assignments_count ?? $course->assignments->count()); ?> tugas
                            </div>
                        </div>
                        <div>
                            <a href="<?php echo e(route('courses.show', $course->id)); ?>" class="btn btn-secondary btn-sm" style="color: var(--tel-red); font-weight: 600;">
                                Buka
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="padding: 2rem 0; text-align: center; color: var(--slate-500); font-size: 0.875rem;">
                        Belum ada data mata kuliah yang tersedia.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Tugas Mendatang & Pengumuman -->
    <div>
        <!-- Tugas Mendatang -->
        <div class="card" style="margin-bottom: 1.5rem;">
            <div class="card-header" style="border-bottom: 1px solid var(--slate-200); padding: 1.25rem 1.5rem;">
                <h3 class="card-title" style="margin: 0; font-size: 1rem;">
                    Tugas Mendatang
                </h3>
                <div class="card-subtitle">
                    Batas waktu dan status penugasan
                </div>
            </div>

            <div style="padding: 0 1.5rem;">
                <?php if(isset($upcomingAssignments) && $upcomingAssignments->isNotEmpty()): ?>
                    <?php $__currentLoopData = $upcomingAssignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="padding: 0.875rem 0; border-bottom: 1px solid var(--slate-200);">
                            <a href="<?php echo e(route('courses.show', $assignment->course_id)); ?>" style="color: var(--slate-900); font-weight: 600; text-decoration: none; font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">
                                <?php echo e($assignment->judul); ?>

                            </a>
                            <div style="font-size: 0.8125rem; color: var(--slate-500); margin-bottom: 0.25rem;">
                                <?php echo e($assignment->course->nama_mk); ?>

                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.75rem;">
                                <span style="color: var(--slate-500);">
                                    Tenggat: <?php echo e($assignment->deadline ? $assignment->deadline->translatedFormat('d M Y, H:i') : '-'); ?>

                                </span>
                                <?php if(Auth::user()->isMahasiswa()): ?>
                                    <?php if($assignment->submissions->isNotEmpty()): ?>
                                        <span style="color: #059669; font-weight: 600;">Sudah dikumpulkan</span>
                                    <?php elseif($assignment->isOverdue()): ?>
                                        <span style="color: var(--tel-red); font-weight: 600;">Terlewat</span>
                                    <?php else: ?>
                                        <span style="color: #d97706; font-weight: 600;">Belum dikumpulkan</span>
                                    <?php endif; ?>
                                <?php elseif(Auth::user()->isDosen()): ?>
                                    <span style="color: var(--slate-600); font-weight: 500;">
                                        <?php echo e($assignment->submissions_count ?? 0); ?> pengumpulan
                                    </span>
                                <?php else: ?>
                                    <span style="color: var(--slate-600);">
                                        <?php echo e($assignment->course->kode_mk); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div style="padding: 1.5rem 0; text-align: center; color: var(--slate-500); font-size: 0.8125rem;">
                        Tidak ada tugas mendatang.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pengumuman Perkuliahan -->
        <?php if(!empty($announcements)): ?>
            <div class="card" style="margin-bottom: 1.5rem;">
                <div class="card-header" style="border-bottom: 1px solid var(--slate-200); padding: 1.25rem 1.5rem;">
                    <h3 class="card-title" style="margin: 0; font-size: 1rem;">
                        Pengumuman Perkuliahan
                    </h3>
                    <div class="card-subtitle">
                        Informasi akademik CeLOE Telkom University
                    </div>
                </div>

                <div style="padding: 0 1.5rem;">
                    <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="padding: 0.875rem 0; border-bottom: 1px solid var(--slate-200);">
                            <div style="display: flex; justify-content: space-between; align-items: baseline; gap: 0.5rem; margin-bottom: 0.25rem;">
                                <span style="font-size: 0.75rem; font-weight: 600; color: var(--tel-red);">
                                    <?php echo e($announcement['kategori'] ?? 'Akademik'); ?>

                                </span>
                                <span style="font-size: 0.75rem; color: var(--slate-400);">
                                    <?php echo e($announcement['tanggal'] ?? ''); ?>

                                </span>
                            </div>
                            <div style="font-size: 0.875rem; font-weight: 600; color: var(--slate-900); margin-bottom: 0.25rem;">
                                <?php echo e($announcement['judul'] ?? ''); ?>

                            </div>
                            <div style="font-size: 0.8125rem; color: var(--slate-600); line-height: 1.4;">
                                <?php echo e($announcement['isi'] ?? ''); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PAW_JURNAL3_NAILA_102042500083\resources\views/dashboard.blade.php ENDPATH**/ ?>