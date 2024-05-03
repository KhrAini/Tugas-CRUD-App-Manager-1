<?php

// Login method
route('/', 'GET', function () {
    return view('login');
});

// Dashboard
route('dashboard', 'GET', 'dashboardController::index');

// Reservasi menu
route('dataReservasi', 'GET', 'dashboardController::reservasi');

// Tambah data reservasi
route('tambahReservasi', 'POST', 'dashboardController::tambahData');

// Edit reservasi
route('editReservasi', 'GET', 'dashboardController::editReservasi');
route('editReservasiUpdate', 'POST', 'dashboardController::editReservasiUpdate');

// Delete data
route('deleteData', 'GET', 'dashboardController::deleteData');