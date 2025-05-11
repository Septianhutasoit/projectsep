@extends('layouts.app')
@section('content')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin: 10px;
            text-align: center;
            width: 320px;
            display: inline-block;
            vertical-align: top;
            transition: transform 0.2s ease-in-out;
            cursor: pointer;
        }

        .profile-container:hover {
            transform: translateY(-10px);
        }

        .profile-container img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #e0e0e0;
        }

        .profile-container h3 {
            font-size: 1.3em;
            margin-bottom: 8px;
            color: #333;
        }

        .profile-container p {
            font-size: 1em;
            color: #666;
            margin-bottom: 12px;
        }

        .profile-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            margin: 5px;
            transition: background-color 0.2s ease-in-out;
        }

        .profile-container a:hover {
            background-color: #0056b3;
        }

        .profile-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 80px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            margin: auto;
            background-color: #fff;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
            position: relative;
        }

        .modal-content img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .modal-content h3 {
            margin-bottom: 10px;
        }

        .close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            color: #333;
        }

        .close:hover {
            color: red;
        }

        @media (max-width: 768px) {
            .profile-container {
                width: 100%;
                margin: 20px 0;
            }
        }
    </style>
    </head>

    <body>

        <h2>Meet Our Doctors</h2>
        <div class="profile-grid">
            <div class="profile-container" onclick="openModal('modal1')">
                <img src="{{ asset('images/galery1.png') }}" alt="Dr. Dimas">
                <h3>Dr. drg. Dimas Ilham Hutomo, Sp.Perio</h3>
                <p>SPESIALIS PERIODONSIA</p>
                <a href="https://wa.me/1234567890" target="_blank">WhatsApp</a>
                <a href="https://instagram.com/drdimasilham" target="_blank">Instagram</a>
            </div>

            <div class="profile-container" onclick="openModal('modal2')">
                <img src="{{ asset('images/placeholder-aan.jpg') }}" alt="Aan Midad">
                <h3>drg. Aan Midad Arrizza, Sp.KG</h3>
                <p>SPESIALIS KONSERVASI GIGI</p>
                <a href="https://wa.me/1234567891" target="_blank">WhatsApp</a>
                <a href="https://instagram.com/drgaan" target="_blank">Instagram</a>
            </div>

            <div class="profile-container" onclick="openModal('modal3')">
                <img src="{{ asset('images/placeholder-abdil.jpg') }}" alt="Abdil Tio">
                <h3>drg. Abdil Tio, Sp.KG</h3>
                <p>SPESIALIS KONSERVASI GIGI</p>
                <a href="https://wa.me/1234567892" target="_blank">WhatsApp</a>
                <a href="https://instagram.com/drabdiltio" target="_blank">Instagram</a>
            </div>
        </div>

        <h2>Meet Our Staff</h2>
        <div class="profile-grid">
            <div class="profile-container" onclick="openModal('modal4')">
                <img src="{{ asset('images/staff1.jpg') }}" alt="Yunita">
                <h3>Yunita Lalisuk</h3>
                <p>Perawat</p>
                <a href="https://wa.me/1234567893" target="_blank">WhatsApp</a>
                <a href="https://instagram.com/yunitalalisuk" target="_blank">Instagram</a>
            </div>

            <div class="profile-container" onclick="openModal('modal5')">
                <img src="{{ asset('images/staff2.jpg') }}" alt="Hippu">
                <h3>Hippu Panjaitan</h3>
                <p>Asisten Dokter</p>
                <a href="https://wa.me/1234567894" target="_blank">WhatsApp</a>
                <a href="https://instagram.com/hippupanjaitan" target="_blank">Instagram</a>
            </div>
        </div>

        <!-- Modals -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal1')">&times;</span>
                <img src="{{ asset('images/galery1.png') }}" alt="Dr. Dimas">
                <h3>Dr. drg. Dimas Ilham Hutomo</h3>
                <p>Spesialis Periodonsia</p>
            </div>
        </div>

        <div id="modal2" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal2')">&times;</span>
                <img src="{{ asset('images/placeholder-aan.jpg') }}" alt="Aan Midad">
                <h3>drg. Aan Midad Arrizza</h3>
                <p>Spesialis Konservasi Gigi</p>
            </div>
        </div>

        <div id="modal3" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal3')">&times;</span>
                <img src="{{ asset('images/placeholder-abdil.jpg') }}" alt="Abdil Tio">
                <h3>drg. Abdil Tio</h3>
                <p>Spesialis Konservasi Gigi</p>
            </div>
        </div>

        <div id="modal4" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal4')">&times;</span>
                <img src="{{ asset('images/staff1.jpg') }}" alt="Yunita">
                <h3>Yunita Lalisuk</h3>
                <p>Perawat Klinik</p>
            </div>
        </div>

        <div id="modal5" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal5')">&times;</span>
                <img src="{{ asset('images/staff2.jpg') }}" alt="Hippu">
                <h3>Hippu Panjaitan</h3>
                <p>Asisten Dokter</p>
            </div>
        </div>

        <!-- Modal Script -->
        <script>
            function openModal(id) {
                document.getElementById(id).style.display = 'block';
            }

            function closeModal(id) {
                document.getElementById(id).style.display = 'none';
            }

            window.onclick = function(event) {
                document.querySelectorAll('.modal').forEach(modal => {
                    if (event.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            };
        </script>

    </body>
@endsection

