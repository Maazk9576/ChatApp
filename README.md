# 💬 Real-Time Chat App (Laravel + Livewire + Laravel Echo + Reverb)

This is a real-time chat application built with **Laravel**, **Livewire**, **Laravel Echo**, and **Reverb (WebSocket Server)**. It supports private messaging, file attachments, message read/unread status, and real-time updates using Reverb.

---

## 🔧 Tech Stack

- **Laravel** – Backend Framework
- **Livewire** – Real-time front-end without JavaScript
- **Laravel Echo** – Client-side JS library for listening to broadcast events
- **Reverb** – Laravel's self-hosted WebSocket server
- **Tailwind CSS** – UI Styling
- **MySQL / SQLite** – Database
- **Pusher-compatible Broadcasting** – via Reverb

---

## 📦 Features

- 🧑‍💬 Realtime 1:1 private chat
- 📡 Live message updates using WebSockets (no refresh)
- 📎 File attachment support (optional)
- ✅ Message read/unread tracking
- 🌙 Dark mode support (optional)
- 🔐 Authentication with Laravel Livewire Starter Kit
- 🎯 Clean responsive UI using TailwindCSS

---

## 🚀 Installation

```bash
# 1. Clone the repo
git clone https://github.com/yourusername/ChatApp.git
cd ChatApp

# 2. Install dependencies
composer install
npm install && npm run dev

# 3. Copy .env and generate app key
cp .env.example .env
php artisan key:generate

# 4. Set up your DB credentials in .env

# 5. Run migrations
php artisan migrate

# 6. Start Laravel server
php artisan serve
