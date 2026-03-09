<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Skytech API</title>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet" />
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: #f7f6f3;
      font-family: 'Outfit', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 40px 24px;
    }
    .logomark {
      width: 56px; height: 56px;
      background: #1a1814;
      border-radius: 16px;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 36px;
    }
    .logomark svg { width: 26px; height: 26px; fill: white; }
    .company {
      font-size: 11px; font-weight: 600;
      letter-spacing: .16em; text-transform: uppercase;
      color: #8a8478; margin-bottom: 20px;
    }
    h1 {
      font-family: 'Instrument Serif', serif;
      font-size: clamp(44px, 8vw, 72px);
      font-weight: 400;
      letter-spacing: -.02em;
      line-height: 1.05;
      color: #1a1814;
      margin-bottom: 20px;
    }
    h1 em { font-style: italic; color: #8a8478; }
    p {
      font-size: 16px; color: #8a8478;
      line-height: 1.7; max-width: 340px;
      margin-bottom: 40px;
    }
    .status {
      display: inline-flex; align-items: center; gap: 9px;
      background: #edf7f2;
      border: 1px solid #b7deca;
      border-radius: 100px;
      padding: 9px 20px;
    }
    .dot {
      width: 7px; height: 7px; border-radius: 50%;
      background: #2d6a4f;
      animation: breathe 2.4s ease-in-out infinite;
    }
    @keyframes breathe {
      0%,100% { box-shadow: 0 0 0 2px rgba(45,106,79,.2); }
      50%      { box-shadow: 0 0 0 5px rgba(45,106,79,.1); }
    }
    .status span {
      font-size: 13px; font-weight: 500;
      color: #2d6a4f;
    }
    footer {
      position: fixed; bottom: 28px;
      font-size: 12px; color: #c4bfb5;
      letter-spacing: .04em;
    }
    @keyframes fadeUp {
      from { opacity:0; transform:translateY(14px); }
      to   { opacity:1; transform:translateY(0); }
    }
    .logomark { animation: fadeUp .4s ease both; }
    .company  { animation: fadeUp .4s .1s ease both; opacity:0; animation-fill-mode:both; }
    h1        { animation: fadeUp .4s .18s ease both; opacity:0; animation-fill-mode:both; }
    p         { animation: fadeUp .4s .26s ease both; opacity:0; animation-fill-mode:both; }
    .status   { animation: fadeUp .4s .34s ease both; opacity:0; animation-fill-mode:both; }
  </style>
</head>
<body>
  <div class="logomark">
    <svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
  </div>
  <p class="company">Skytech Technology Solutions</p>
  <h1>Welcome to<br>Skytech <em>API</em></h1>
  <p>Powerful and secure API services for enterprise-grade applications.</p>
  <div class="status">
    <span class="dot"></span>
    <span>API is running successfully</span>
  </div>
  <footer>© {{ date('Y') }} Skytech Technology Solutions</footer>
</body>
</html>