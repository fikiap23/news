@extends('front_new.layouts.app')

@section('title', 'Daftar Jenis Izin')

@section('content')
    <div class="container mt-4">
        <!-- Start header section -->
        <section class="text-center py-5" style="background: linear-gradient(135deg, #ff7300, #f3d49b); color: #fff;">
            <div class="container">
                <h1 class="display-5 fw-bold">Daftar Jenis Izin</h1>
                <p class="lead">Daftar Jenis Perizinan dan Non Perizinan</p>
            </div>
        </section>
        <!-- End header section -->

        <!-- Daftar Jenis Perizinan Table Section -->
        <div class="mt-5">
            <h2 class="mb-4">Daftar Jenis Perizinan</h2>
            <table id="jenisIzinTable" class="table table-bordered text-black">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jenis Izin</th>
                        <th>Durasi (Hari)</th>
                        <th>Bidang Izin</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permitRequirements as $index => $pr)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pr->permit_type_name }}</td>
                            <td>{{ $pr->duration_days }}</td>
                            <td>{{ $pr->permit_field }}</td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#requirementModal"
                                    data-requirements="{{ json_encode($pr->requirements) }}"
                                    onclick="showRequirements(this)">
                                    Lihat Persyaratan
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Viewing Requirements -->
    <div class="modal fade" id="requirementModal" tabindex="-1" aria-labelledby="requirementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ff7300; color: white;">
                    <h5 class="modal-title" id="requirementModalLabel">Persyaratan Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="requirementModalBody">
                    <!-- Requirements will be dynamically injected here -->
                </div>
                <!-- Download button moved inside modal -->
                <div class="modal-footer">
                    <button class="btn btn-outline-success btn-sm" onclick="downloadPDF()">Download Persyaratan PDF</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jsPDF CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- Custom JS to show the modal content and generate PDF -->
    <script>
        // Function to show the requirements in the modal
        function showRequirements(button) {
            // Get the requirements from the data-requirements attribute
            const requirements = JSON.parse(button.getAttribute('data-requirements'));

            let modalBody = `<ul class="list-group">`;

            // Loop through the requirements and add them to the modal body
            requirements.forEach(requirement => {
                modalBody += `<li class="list-group-item"><strong>${requirement.category}</strong><ul>`;
                requirement.requirements.forEach(item => {
                    modalBody += `<li>✔ ${item}</li>`;
                });
                modalBody += `</ul></li>`;
            });

            modalBody += `</ul>`;
            document.getElementById('requirementModalBody').innerHTML = modalBody;
        }

        // Function to download the PDF
        function downloadPDF() {
            // Get the requirements data from the modal's body content
            const modalBody = document.getElementById('requirementModalBody');
            const requirements = Array.from(modalBody.querySelectorAll('.list-group-item')).map(item => {
                const category = item.querySelector('strong').innerText;
                const reqItems = Array.from(item.querySelectorAll('ul li')).map(li => li.innerText.replace('✔ ',
                    ''));
                return {
                    category,
                    requirements: reqItems
                };
            });

            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Set font for the document
            doc.setFont("helvetica");
            doc.setFontSize(14);

            // Title of the document
            doc.setFontSize(18);
            doc.text("Persyaratan Izin", 105, 20, {
                align: "center"
            });

            let yPosition = 30; // Start at 30 to leave space for the title
            const marginLeft = 15; // Left margin for text

            // Loop through the requirements
            requirements.forEach((requirement) => {
                // Add category title (e.g., "Baru", "Balik_Nama/Perubahan")
                doc.setFontSize(16);
                doc.text(requirement.category, marginLeft, yPosition);
                yPosition += 10;

                // Add each requirement as a bullet point
                doc.setFontSize(14);
                requirement.requirements.forEach((item) => {
                    const lines = doc.splitTextToSize(`• ${item}`, 180 -
                        marginLeft); // Split text to fit within the page
                    doc.text(lines, marginLeft, yPosition);
                    yPosition += lines.length * 7; // Adjust yPosition based on the number of lines
                });

                // Add space between categories
                yPosition += 12;
            });

            // Add footer with page number
            doc.setFontSize(10);
            doc.text("Halaman " + doc.internal.getNumberOfPages(), 180, doc.internal.pageSize.height - 10);

            // Save the document as a PDF
            doc.save("persyaratan_izin.pdf");
        }
    </script>
@endsection
