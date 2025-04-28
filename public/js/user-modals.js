  
   
      
        function openClientDetail(button) {
    document.getElementById('clientNameTitle').textContent = button.getAttribute('data-name');
    document.getElementById('clientFullName').textContent = button.getAttribute('data-name');
    document.getElementById('clientEmail').textContent = button.getAttribute('data-email');
    document.getElementById('clientPhone').textContent = button.getAttribute('data-phone');
    document.getElementById('clientJoinDate').textContent = button.getAttribute('data-created_at');
    document.getElementById('clientAddress').textContent = button.getAttribute('data-address');
    document.getElementById('clientZipCode').textContent = button.getAttribute('data-postal_code');
    document.getElementById('clientCity').textContent = button.getAttribute('data-city');
    document.getElementById('clientCountry').textContent = button.getAttribute('data-country');
    document.getElementById('clientJoinDate').textContent = button.getAttribute('data-inscription');
   
    
    document.getElementById('clientDetailModal').style.display = 'flex';
}


       
        function closeClientDetail() {
            document.getElementById('clientDetailModal').style.display = 'none';
        }

       
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('clientDetailModal');
            if (event.target === modal) {
                closeClientDetail();
            }
        });

        
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        if (hamburger) {
            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                navLinks.classList.toggle('active');
            });
        }

        
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }
        });