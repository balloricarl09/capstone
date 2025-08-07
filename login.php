<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Use Inter font for a clean, modern look -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
        /* Background color from the provided palette: #656E77 */
        background-color: #656e77;
      }
    </style>
  </head>
  <body class="flex items-center justify-center min-h-screen p-4">
    <div
      class="w-full max-w-sm mx-auto p-8 rounded-xl shadow-2xl"
      style="background-color: #dddbde"
    >
      <!-- Title using the text & UI color from the palette -->
      <h1 class="text-3xl font-bold text-center mb-6" style="color: #3b373b">
         Login 
      </h1>
      <form>
        <!-- Email Input Field -->
        <div class="mb-4">
          <label
            for="email"
            class="block text-sm font-medium mb-2"
            style="color: #3b373b"
            >Email Address</label
          >
          <input
            type="email"
            id="email"
            class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-offset-2"
            style="
              background-color: #f5f5f5;
              border-color: #c0c2c4;
              color: #3b373b;
            "
            placeholder="you@example.com"
            required
          />
        </div>
        <!-- Password Input Field -->
        <div class="mb-6">
          <label
            for="password"
            class="block text-sm font-medium mb-2"
            style="color: #3b373b"
            >Password</label
          >
          <input
            type="password"
            id="password"
            class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-offset-2"
            style="
              background-color: #f5f5f5;
              border-color: #c0c2c4;
              color: #3b373b;
            "
            placeholder="••••••••"
            required
          />
        </div>
        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2"
          style="
            background-color: #3b373b;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          "
        >
          Sign In
        </button>
      </form>
      <!-- Forgot Password Link -->
      <div class="mt-4 text-center">
        <a
          href="#"
          class="text-sm font-medium hover:underline"
          style="color: #3b373b"
          >Forgot Password?</a
        >
      </div>
    </div>
  </body>
</html>
