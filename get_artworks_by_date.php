<script>
    async function fetchArtworks() {
        const auctionDate = document.getElementById('auction_date').value;
        
        if (auctionDate) {
            // Fetch artworks based on the selected auction date
            const response = await fetch(`get_artworks.php?date=${auctionDate}`);
            const artworks = await response.json();

            // Get the select element for artworks
            const select = document.getElementById('artworks');
            select.innerHTML = ''; // Clear previous options

            // Populate the select dropdown with artworks
            artworks.forEach(artwork => {
                const option = document.createElement('option');
                option.value = artwork.id;
                option.textContent = artwork.description; // Display artwork description
                select.appendChild(option);
            });
        }
    }

    // Fetch artworks whenever the auction date changes
    document.getElementById('auction_date').addEventListener('change', fetchArtworks);
</script>
