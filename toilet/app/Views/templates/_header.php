<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../" />
    <title>Toilet | <?= $title ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template - Metronic by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= BASE_URL ?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>

<body id="kt_body" class="header-fixed">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']) : ?>
                <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                    <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
                        <a href="<?= BASE_URL ?>">
                            <h1 class="logo h-20px text-center" style="font-weight: bold;">Toilet<span class="text-warning">.</span></h1>
                        </a>
                    </div>
                    <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
                        <div class="w-100 hover-scroll-overlay-y d-flex pe-3" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
                            <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto" id="#kt_aside_menu" data-kt-menu="true">
                                <div class="menu-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link" href="<?= BASE_URL ?>">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-black-right fs-2"></i>
                                            </span>
                                            <span class="menu-title">Dashboard</span>
                                        </a>
                                    </div>
                                </div>
                                <?php if ($_SESSION['user']['role'] == "Admin") : ?>
                                    <div class="menu-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="<?= BASE_URL ?>/users">
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-black-right fs-2"></i>
                                                </span>
                                                <span class="menu-title">Users</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <div class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-black-right fs-2"></i>
                                        </span>
                                        <span class="menu-title">Toilet</span>
                                        <span class="menu-arrow"></span>
                                    </div>

                                    <div class="menu-sub menu-sub-accordion">
                                        <?php if ($_SESSION['user']['role'] == "Admin") : ?>
                                            <div class="menu-item">
                                                <a href="/toilet/toilet" class="menu-link">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Daftar Toilet</span>
                                                </a>
                                            </div>
                                        <?php endif ?>

                                        <div class="menu-item">
                                            <a href="/toilet/toilet/checklist" class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Checklist Toilet</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link" href="<?= BASE_URL ?>/report">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-black-right fs-2"></i>
                                            </span>
                                            <span class="menu-title">Report</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-40px">
                                    <div class="bg-white text-dark me-1 rounded-circle d-flex justify-content-center align-items-center fw-bold" style="width: 40px; height: 40px; font-size: 1.3em;">
                                        <?= $this->initial($_SESSION['user']['name']) ?>
                                    </div>
                                </div>
                                <div class="ms-2">
                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-1"><?= $_SESSION['user']['name'] ?></a>
                                    <span class="text-muted fw-semibold d-block fs-7 lh-1"><?= $_SESSION['user']['role'] ?></span>
                                </div>
                            </div>
                            <div class="ms-1">
                                <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true" data-kt-menu-placement="top-end">
                                    <i class="ki-duotone ki-setting-2 fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <div class="menu-item px-5">
                                        <a href="<?= BASE_URL ?>/users/logout" class="menu-link px-5">Sign Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif ?>
            <div class="<?= isset($_SESSION['is_login']) && $_SESSION['is_login'] ? "wrapper" : "" ?> d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']) : ?>

                    <div id="kt_header" class="header mt-0 mt-lg-0 pt-lg-0" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}">
                        <div class="container d-flex flex-stack flex-wrap gap-4" id="kt_header_container">
                            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                                <h1 class="d-flex flex-column text-gray-900 fw-bold my-0 fs-1"><?= $title_page ?></h1>
                                <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="<?= BASE_URL ?>" class="text-muted text-hover-primary">Home</a>
                                    </li>
                                    <li class="breadcrumb-item text-gray-900"><?= $title_breadcrumb ?? '' ?></li>
                                </ul>
                            </div>
                            <div class="d-flex d-lg-none align-items-center ms-n3 me-2">
                                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-1 mt-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <a href="<?= BASE_URL ?>" class="d-flex align-items-center">
                                    <h1 class="logo h-20px text-center" style="font-weight: bold;">Toilet<span class="text-warning">.</span></h1>

                                    <img alt="Logo" src="<?= BASE_URL ?>/assets/media/logos/demo3-dark.svg" class="theme-dark-show h-20px" /> -->
                                </a>
                            </div>
                            <div class="d-flex align-items-center flex-shrink-0 mb-0 mb-lg-0">
                                <div class="d-flex align-items-center ms-3 ms-lg-4">
                                    <a href="#" class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                            <span class="path7"></span>
                                            <span class="path8"></span>
                                            <span class="path9"></span>
                                            <span class="path10"></span>
                                        </i>
                                        <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-night-day fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                        <span class="path6"></span>
                                                        <span class="path7"></span>
                                                        <span class="path8"></span>
                                                        <span class="path9"></span>
                                                        <span class="path10"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">Light</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-moon fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">Dark</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-screen fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">System</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="container-xxl" id="kt_content_container">
                        <?php if (isset($_SESSION['alert'])) : ?>
                            <div class="alert alert-<?= $_SESSION['alert'][0] ?> alert-dismissible fade show" role="alert">
                                <?= $_SESSION['alert'][1] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['alert']) ?>
                        <?php endif ?>