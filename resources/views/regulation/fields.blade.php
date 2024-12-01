<form id="regulationForm" method="POST" action="{{ route('regulation.store') }}">
    @csrf

    <div id="regulation-container">
        <!-- Default item deskripsi pertama akan ditambahkan di sini -->
    </div>

    <div class="mb-3">
        <button type="button" id="addItemBtn" class="btn btn-primary">
            + Tambah Regulasi
        </button>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('regulation.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('regulation-container');
        const addItemBtn = document.getElementById('addItemBtn');

        // Counter untuk unique id setiap deskripsi
        let counter = 0;

        // Fungsi untuk menambah item deskripsi
        function addDescriptionItem(defaultValue = '') {
            counter++;

            const newItem = document.createElement('div');
            newItem.classList.add('mb-3', 'd-flex', 'align-items-center');
            newItem.innerHTML = `
                <textarea name="descriptions[]" class="form-control me-2" 
                    placeholder="Deskripsi Regulasi" required>${defaultValue}</textarea>
                <button type="button" class="btn btn-danger remove-btn">Hapus</button>
            `;

            container.appendChild(newItem);

            // Tambahkan event listener untuk tombol hapus
            newItem.querySelector('.remove-btn').addEventListener('click', function() {
                newItem.remove();
            });
        }

        // Tambahkan item deskripsi pertama saat halaman dimuat
        addDescriptionItem();

        // Tambah item deskripsi baru saat tombol "Tambah Deskripsi" diklik
        addItemBtn.addEventListener('click', function() {
            addDescriptionItem();
        });
    });
</script>
