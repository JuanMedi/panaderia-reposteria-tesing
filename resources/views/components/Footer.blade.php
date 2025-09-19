<footer class="footer">
    <div class="footer-content">
    <img src="{{ asset('images/logoconnegro.png') }}" alt="Logo" class="footer-logo">
    <p class="footer-text">© 2025 Panadería y repostería.</p>
  </div>

  <style>
  .footer {
    background-color: #fff7ec;
    padding: 20px;
    border-top: 1px solid #e0dcd3;
  }

  .footer-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
  }

  .footer-logo {
    height: 50px;
    object-fit: contain;
  }

  .footer-text {
    color: #6c6c6c;
    font-size: 14px;
    font-family: 'Georgia', serif;
  }

  @media (max-width: 600px) {
  .footer-content {
    flex-direction: column;
    align-items: center;
  }

  .footer-logo {
    height: 40px;
    margin-bottom: 10px;
  }

  .footer-text {
    font-size: 13px;
  }
}
  </style>
    </footer>
