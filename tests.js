function generateFileList() {
    const testList = document.getElementById('testList');

    testList.innerHTML = '';
    fetch('categorias.php')
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(files => {
            console.log('Files:', files);
            if (files.length === 0) {
                testList.innerHTML = '<p>No hay archivos disponibles.</p>';
                return;
            }

            files.forEach(file => {
                // Eliminar la extensión .csv del nombre del archivo
                const baseName = file.replace('.csv', '');
                
                // Ajuste para mantener solo la primera letra mayúscula
                const displayName = baseName.replace(/_/g, ' ').toLowerCase();
                const correctedName = displayName.charAt(0).toUpperCase() + displayName.slice(1);

                const link = document.createElement('a');
                link.href = `creacion_test.php?type=${baseName}`;
                link.className = 'test-link';
                link.textContent = correctedName;

                const listItem = document.createElement('div');
                listItem.className = 'test-item';
                listItem.appendChild(link);

                testList.appendChild(listItem);
            });
        })
        .catch(error => {
            console.error('Error fetching files:', error);
            testList.innerHTML = '<p>Error loading tests. Please try again later.</p>';
        });
}

document.addEventListener('DOMContentLoaded', generateFileList);
