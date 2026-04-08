<?php
session_start();
if (!isset($_SESSION['auth_kwoof']) || $_SESSION['auth_kwoof'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Digital Marketing Report — Kwoof Pet Care — April 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    * { font-family: 'Inter', sans-serif; }
    body { background: #0f172a; color: #e2e8f0; }
    .glass { background: rgba(30, 41, 59, 0.6); backdrop-filter: blur(16px); border: 1px solid rgba(148, 163, 184, 0.08); }
    .glass-lighter { background: rgba(51, 65, 85, 0.4); border: 1px solid rgba(148, 163, 184, 0.06); }
    .glass-accent { background: rgba(59, 130, 246, 0.08); border: 1px solid rgba(59, 130, 246, 0.15); }
    .bg-pattern {
        position: fixed; inset: 0; z-index: 0;
        background-image:
            radial-gradient(circle at 15% 50%, rgba(59, 130, 246, 0.07) 0%, transparent 50%),
            radial-gradient(circle at 85% 20%, rgba(14, 165, 233, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 50% 85%, rgba(99, 102, 241, 0.04) 0%, transparent 50%);
        pointer-events: none;
    }
    .grid-bg {
        position: fixed; inset: 0; z-index: 0;
        background-image:
            repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(148,163,184,0.025) 39px, rgba(148,163,184,0.025) 40px),
            repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(148,163,184,0.025) 39px, rgba(148,163,184,0.025) 40px);
        pointer-events: none;
    }
    .tab-btn { transition: all 0.2s; cursor: pointer; -webkit-tap-highlight-color: transparent; }
    .tab-btn.active { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border-color: rgba(59, 130, 246, 0.3); }
    .tab-btn:not(.active):hover { background: rgba(148, 163, 184, 0.08); }
    .tab-content { display: none; animation: fadeUp 0.4s ease; }
    .tab-content.active { display: block; }
    #tabNav { -webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none; }
    #tabNav::-webkit-scrollbar { display: none; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
    .kpi-card { transition: transform 0.2s; }
    .kpi-card:hover { transform: translateY(-2px); }
    table { border-collapse: separate; border-spacing: 0; }
    thead th { position: sticky; top: 0; }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: rgba(15,23,42,0.5); }
    ::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.3); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(148,163,184,0.5); }
    .alert-card { border-left: 4px solid #ef4444; }
    .success-card { border-left: 4px solid #22c55e; }
    .warning-card { border-left: 4px solid #f59e0b; }
    .score-ring { width: 160px; height: 160px; }
</style>
</head>
<body class="min-h-screen">
<div class="bg-pattern"></div>
<div class="grid-bg"></div>

<!-- HEADER -->
<header class="relative z-10 glass border-b border-slate-700/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/15 border border-blue-500/25 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">Digital Marketing & SEO Opportunities Report</h1>
                        <p class="text-sm text-slate-400">April 2026 — Initial Diagnostic</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Client</p>
                    <p class="text-sm text-white font-medium">Kwoof Pet Care</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Prepared by</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Date</p>
                    <p class="text-sm text-white font-medium">April 7, 2026</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Log Out
                </a>
            </div>
        </div>
        <div class="mt-4 glass-accent rounded-xl px-5 py-3 flex flex-wrap items-center gap-3">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-blue-300 font-semibold text-sm">Kwoof Pet Care</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">kwoofpetcare.com</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">Jackson Heights, Queens, NYC 11368</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-50 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Summary for the Owner</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('perdidas')">What You Are Losing</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('fortalezas')">Your Strengths</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('contenido')">Content Plan</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('inversion')">Investment & Next Steps</button>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-8">

<!-- ==================== TAB 1: SUMMARY ==================== -->
<div id="tab-resumen" class="tab-content active">

    <!-- Intro -->
    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">What is this report?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">This document analyzes the online presence of <strong class="text-white">Kwoof Pet Care</strong> — how your business looks on the internet and how easy it is for potential clients in Queens and Brooklyn to find you when they search on Google. We will show you what is working, what is missing, and how much revenue you could be leaving on the table.</p>
            </div>
        </div>
    </div>

    <!-- What is SEO -->
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-cyan-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-2">But first... What is "SEO" and why does it matter for your business?</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-3"><strong class="text-white">SEO</strong> stands for "Search Engine Optimization." In simple terms: <strong class="text-white">it is the process of making your website appear at the top of Google when someone searches for the services you offer.</strong></p>
                <p class="text-slate-400 text-sm leading-relaxed mb-3">Think about it this way: when you need a service, the first thing you do is Google it. Your clients do the same. If Kwoof does not appear on the first page of Google, <strong class="text-white">it is like having a pet care business on a street where nobody walks by.</strong></p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">How does it work?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">Google sends "robots" that read your website. Based on what they find (text, titles, images, speed), they decide where to show your site when someone searches for pet care in Queens or Brooklyn.</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">Why does it matter?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">75% of people never go past the first page of Google (source: Backlinko). If you are on page 2 or lower, you practically do not exist for potential clients searching for pet care near them.</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">What is the benefit?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">Unlike paid ads (which stop the moment you stop paying), SEO generates FREE and permanent visits. Each improvement we make to your site builds up over time like a snowball effect.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Score -->
    <h2 class="text-white text-lg font-bold mb-4">Overall Digital Marketing Score</h2>
    <div class="glass rounded-2xl p-8 mb-8">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="relative">
                <canvas id="scoreChart" width="160" height="160" class="score-ring"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-3xl font-extrabold text-red-400">25</span>
                    <span class="text-xs text-slate-400">out of 100</span>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">Grade F — Critical</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">Out of 100 possible points, your website scored <strong class="text-white">25 points</strong>. This means your online presence has serious issues that are costing you clients every single month. The good news: all of these problems have solutions and your growth potential is enormous — especially because most local competitors are not doing much better.</p>
            </div>
        </div>
    </div>

    <!-- Score breakdown -->
    <h2 class="text-white text-lg font-bold mb-4">Breakdown: What We Evaluated and What It Means</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">What we evaluated</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Score</th>
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">What it means for your business</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Visibility on Google</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">15/100</span></td>
                        <td class="px-6 py-4 text-slate-400">When someone in Jackson Heights searches "dog walking near me" on Google, your business does not appear. Those potential clients go directly to a competitor.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Google Maps & Local Presence</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">5/100</span></td>
                        <td class="px-6 py-4 text-slate-400">You have NO Google Business Profile. This means you are completely invisible on Google Maps — the #1 way people find local pet care services in NYC.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Website Content & Messaging</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">30/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Your website has only 5 pages and no blog. You need at least 15-20 pages for Google to understand what you offer. Your pages are missing the key information Google uses to decide where to rank you.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Online Reviews & Reputation</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">0/100</span></td>
                        <td class="px-6 py-4 text-slate-400">You have ZERO online reviews anywhere — no Google, no Yelp, no Facebook reviews. When someone is choosing between you and a competitor with 50+ glowing reviews, they will choose the one with reviews every time.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Social Media Presence</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">20/100</span></td>
                        <td class="px-6 py-4 text-slate-400">You only have Instagram (@kwoof__). You are missing Facebook, TikTok (pet content goes viral!), Nextdoor (the #1 app where neighbors recommend local services), and Yelp.</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-white font-medium">Technical Website Health</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">40/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Your site runs on Squarespace with HTTPS — that is a good base. But there are issues confusing Google: duplicate pages, missing titles, a typo ("Pet Bording"), and your site is not telling Google you are a local business in Queens.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Alert Cards -->
    <h2 class="text-white text-lg font-bold mb-4">Critical Alerts You Need to Know</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">You Do NOT Exist on Google Maps</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">When someone near you searches "pet care near me," Google shows a map with 3 businesses. You are NOT one of them. A Google Business Profile is FREE to set up and is the single most important thing for any local business. Without it, you are invisible.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">ZERO Online Reviews Anywhere</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">In NYC, reviews are EVERYTHING. 93% of consumers read online reviews before choosing a local service (source: BrightLocal 2024). You have zero reviews on Google, Yelp, and Facebook. A competitor with reviews will always win, even if your service is better.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Not Listed on Yelp, Rover, or Any Directory</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Your business is not on Yelp (NYC's top review platform), Rover (the #1 pet care marketplace), Nextdoor (the neighborhood app), or any directory. These are FREE profiles that bring you clients every day. It is like having a phone number that is not in any phone book.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Only 5 Pages on Your Website</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Each page on your website is a chance for Google to show your business. With only 5 pages, you appear for very few searches. Competitors with blogs and service pages have 50-100+ pages — Google shows THEM hundreds of times more than you.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 2: WHAT YOU ARE LOSING ==================== -->
<div id="tab-perdidas" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Clients Who Are Searching But Cannot Find You</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">Every month, hundreds of people in Queens and Brooklyn search Google for exactly the services you offer. But because your business is not optimized, those clients end up hiring someone else. Here is exactly what they search and how much money that represents.</p>
        </div>
    </div>

    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">What people search on Google</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Searches/month*</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Does Kwoof appear?</th>
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Revenue you could be earning</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"dog walking Jackson Heights"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~50-150</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">Not showing</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~15-45 visitors &rarr; 3-9 new clients at $20/walk x 20 walks/mo = <strong class="text-green-400">$1,200-$3,600/mo</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"pet sitting Queens NY"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~100-300</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">Not showing</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~30-90 visitors &rarr; 5-15 overnight bookings at $75/night = <strong class="text-green-400">$375-$1,125/mo</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"dog walker near me" (Queens)</td>
                        <td class="px-4 py-4 text-center text-slate-300">~200-400</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">Not showing</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~60-120 visitors &rarr; 10-20 new clients at $20/walk x 20 walks/mo = <strong class="text-green-400">$4,000-$8,000/mo</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"pet boarding Queens"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~150-300</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">Not showing</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~45-90 visitors &rarr; 5-10 boarding stays at $75/night x 3 nights = <strong class="text-green-400">$1,125-$2,250/mo</strong></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-4 text-white font-medium">"pet care 11368"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~10-30</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">Not showing</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">Small volume but HIGH intent — searching your exact zip code = <strong class="text-green-400">$300-$900/mo</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 border-t border-slate-700/30">
            <p class="text-slate-500 text-[10px] leading-relaxed">*Estimates based on Google Keyword Planner and Semrush. Revenue calculations: first Google result gets ~27% of clicks (Backlinko, 2023), conservative 10-15% conversion for local services (WordStream 2024). Pricing based on Queens pet care market averages.</p>
        </div>
    </div>

    <!-- Total lost -->
    <div class="alert-card glass rounded-2xl p-6 mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-red-400 font-bold text-lg mb-1">Money You Are Leaving on the Table</h3>
                <p class="text-white text-2xl font-extrabold">$3,000 — $10,000+ per month</p>
                <p class="text-slate-400 text-sm mt-1">We estimate Kwoof is missing $3,000 to $10,000+ in monthly revenue from clients who search Google for pet care in Queens and Brooklyn but hire someone else because they cannot find you.</p>
            </div>
        </div>
    </div>

    <!-- Problems -->
    <h2 class="text-white text-lg font-bold mb-4">Problems That Are Costing You Money</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">No Google Business Profile = Invisible on Maps</h4>
            <p class="text-slate-400 text-xs leading-relaxed">When someone near you searches "dog walking near me," Google shows a map with 3 businesses. You are NOT one of them. A Google Business Profile is free and is the most important thing for any local service business. Without it, 90% of your potential clients will never know you exist.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Duplicate Homepage Confusing Google</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Your website has two versions of the homepage (/ and /home) showing the same content. This confuses Google — it does not know which is the "real" one. Imagine having two identical business cards with different phone numbers — people do not know which to call.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">No Contact Form on Your Website</h4>
            <p class="text-slate-400 text-xs leading-relaxed">There is no form on your website for potential clients to reach out. Many young pet owners in NYC prefer sending a quick message rather than making a phone call. Without a form, you lose every one of those clients.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Page Titles Do Not Mention Your Location</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Your website title says "Kwoof | Trusted Pet Care" but never mentions Queens, Jackson Heights, Brooklyn, or NYC. Google does not know WHERE you are located, so it cannot show you to local searchers. It is like a business card without an address.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Gallery Page Has a Generic Title</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Your gallery page is titled "Gallery 3" — a default Squarespace template name — and has no description for Google. This page could showcase happy pets and build trust, but Google has no idea what it is about.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Typo: "Pet Bording" Instead of "Boarding"</h4>
            <p class="text-slate-400 text-xs leading-relaxed">One of your headings says "Pet Bording" instead of "Pet Boarding." When pet owners are deciding who to trust with their beloved pets, small details matter. Google may also show this typo in search results.</p>
        </div>
    </div>

    <!-- Competitors -->
    <h2 class="text-white text-lg font-bold mb-4">Your Competitors ARE Doing This</h2>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">What they have</th>
                        <th class="text-center px-4 py-4 text-red-400 font-semibold text-xs uppercase tracking-wider">Kwoof</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Rover/Wag</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Local competitors</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Google Business Profile</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                        <td class="px-4 py-3 text-center text-green-400">Yes</td>
                        <td class="px-4 py-3 text-center text-green-400">Most have one</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Online reviews</td>
                        <td class="px-4 py-3 text-center text-red-400">Zero</td>
                        <td class="px-4 py-3 text-center text-green-400">50-200+</td>
                        <td class="px-4 py-3 text-center text-green-400">10-100+</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Listed on Yelp</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                        <td class="px-4 py-3 text-center text-green-400">Yes</td>
                        <td class="px-4 py-3 text-center text-green-400">Most do</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Blog/content articles</td>
                        <td class="px-4 py-3 text-center text-red-400">No blog</td>
                        <td class="px-4 py-3 text-center text-green-400">Extensive</td>
                        <td class="px-4 py-3 text-center text-yellow-400">Some</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Facebook page</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                        <td class="px-4 py-3 text-center text-green-400">Yes</td>
                        <td class="px-4 py-3 text-center text-green-400">Most do</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium">Multiple service pages</td>
                        <td class="px-4 py-3 text-center text-red-400">1 page for all</td>
                        <td class="px-4 py-3 text-center text-green-400">Separate pages</td>
                        <td class="px-4 py-3 text-center text-yellow-400">Varies</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h4 class="text-green-400 font-bold text-sm mb-1">The Good News</h4>
                <p class="text-slate-300 text-sm leading-relaxed"><strong class="text-white">Jackson Heights has very few pet care businesses with a strong online presence.</strong> Most local competitors have basic websites and minimal SEO. If Kwoof acts now, you can become THE dominant pet care brand in the area within 6 months. The window of opportunity is wide open.</p>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 3: STRENGTHS ==================== -->
<div id="tab-fortalezas" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">What You Have Going for You</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">It is not all bad news. Kwoof Pet Care has solid foundations that many competitors lack. We just need to <strong class="text-white">make these advantages visible online</strong> so Google and your clients know about them.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Memorable Brand — "K-WOOF"</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Your brand name is fun, unique, and easy to remember. In a market full of generic names like "Queens Pet Care," Kwoof stands out. A memorable brand means clients will tell their friends about you.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Fully Insured & Bonded</h4>
            <p class="text-slate-400 text-xs leading-relaxed">This is a HUGE trust factor. Many pet walkers in NYC are not insured. Being insured and bonded makes pet owners feel safe. We need to put this front and center on every page — it is your #1 trust differentiator.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Professional Booking System (TimeToPet)</h4>
            <p class="text-slate-400 text-xs leading-relaxed">You use TimeToPet for scheduling and bookings. This makes you look more professional than competitors using text messages. When new clients come from SEO, you are ready to handle the volume.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Clear Service Areas Defined</h4>
            <p class="text-slate-400 text-xs leading-relaxed">You serve Queens (Corona, LIC, 5-mile area) and Brooklyn (Greenpoint, Williamsburg, PLG, Carroll Gardens). Having defined areas is great — we can create dedicated pages for each neighborhood.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Your Own Domain & Website</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Having kwoofpetcare.com is a major advantage over hundreds of pet walkers who only have a Rover profile. Your own website gives you full control and Google sees it as more authoritative.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Competitive Queens Pricing</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Your pricing is right in the sweet spot — competitive but not cheap. Tiered options (15/30/45/60 min), holiday rates, transparent pricing. This builds trust and makes it easy for clients to decide.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">HTTPS Security & Image Optimization</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Your website has security (the lock icon), images load fast with lazy loading, and your photos have good descriptions. These are technical foundations many small businesses miss.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Jackson Heights = Untapped Market</h4>
            <p class="text-slate-400 text-xs leading-relaxed">One of NYC's most diverse neighborhoods with a large pet-owning community. Very few pet care providers have real online presence here. If you optimize for this area, you can own the local market.</p>
        </div>
    </div>
</div>

<!-- ==================== TAB 4: CONTENT PLAN ==================== -->
<div id="tab-contenido" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Content Plan — 20 Articles for Month 1</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Why does your business need blog articles?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">When someone searches "best dog parks in Jackson Heights" and your website has an article about it, Google shows YOUR article. That person reads it, sees you offer dog walking, and books a meet & greet. <strong class="text-white">Each article is like a salesperson that works 24/7 without a salary.</strong></p>
            </div>
        </div>
    </div>

    <h3 class="text-white font-bold mb-3">The 3 Types of Articles and What They Do</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #22c55e;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400 mb-2">Transactional</span>
            <p class="text-slate-400 text-xs leading-relaxed">The person is ready to <strong class="text-white">BOOK NOW</strong>. Searching for prices, "near me," availability. These generate direct bookings.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #f59e0b;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-500/15 text-amber-400 mb-2">Commercial</span>
            <p class="text-slate-400 text-xs leading-relaxed">The person is <strong class="text-white">COMPARING</strong> options. "Best dog walkers in Queens." These position Kwoof as the expert.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #3b82f6;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-blue-500/15 text-blue-400 mb-2">Informational</span>
            <p class="text-slate-400 text-xs leading-relaxed">The person wants to <strong class="text-white">LEARN</strong>. Tips, guides, advice. These attract massive traffic and build authority.</p>
        </div>
    </div>

    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-center px-3 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider w-8">#</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Article Title</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Type</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Target keyword</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">1</td><td class="px-4 py-3 text-white text-xs font-medium">Best Dog Parks in Jackson Heights & Corona: A Complete Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog parks Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">2</td><td class="px-4 py-3 text-white text-xs font-medium">How Much Does Dog Walking Cost in Queens, NY? 2026 Pricing Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog walking cost Queens</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">3</td><td class="px-4 py-3 text-white text-xs font-medium">Dog Sitting vs. Dog Boarding: Which Is Better for Your Pet?</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comm</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog sitting vs boarding</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">4</td><td class="px-4 py-3 text-white text-xs font-medium">10 Tips for Keeping Your Dog Safe in NYC Summers</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog safety summer NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">5</td><td class="px-4 py-3 text-white text-xs font-medium">Finding Reliable Pet Care in Jackson Heights: What to Look For</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comm</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet care Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">6</td><td class="px-4 py-3 text-white text-xs font-medium">Dog Walking Services in Queens & Brooklyn — Book Today</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog walking Queens Brooklyn</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">7</td><td class="px-4 py-3 text-white text-xs font-medium">Pet-Friendly Apartments in Jackson Heights: The Ultimate Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet friendly apartments Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">8</td><td class="px-4 py-3 text-white text-xs font-medium">5 Best Dog Walkers in Queens: How to Choose the Right One</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comm</span></td><td class="px-4 py-3 text-slate-400 text-xs">best dog walkers Queens</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">9</td><td class="px-4 py-3 text-white text-xs font-medium">Overnight Pet Sitting in Queens: What to Expect & How to Prepare</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">overnight pet sitting Queens</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">10</td><td class="px-4 py-3 text-white text-xs font-medium">How to Prepare Your Dog for a Dog Walker: First-Time Tips</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">prepare dog for walker</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">11</td><td class="px-4 py-3 text-white text-xs font-medium">Why Insured & Bonded Pet Care Matters (And How to Verify)</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comm</span></td><td class="px-4 py-3 text-slate-400 text-xs">insured bonded pet care NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">12</td><td class="px-4 py-3 text-white text-xs font-medium">Pet Boarding in Queens & Brooklyn: Rates, Tips & How to Book</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet boarding Queens Brooklyn</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">13</td><td class="px-4 py-3 text-white text-xs font-medium">Walking Your Dog in Winter in NYC: Cold Weather Safety Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog walking winter NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">14</td><td class="px-4 py-3 text-white text-xs font-medium">Rover vs. Hiring a Local Dog Walker: Pros, Cons & Real Costs</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comm</span></td><td class="px-4 py-3 text-slate-400 text-xs">Rover vs local dog walker</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">15</td><td class="px-4 py-3 text-white text-xs font-medium">In-Home Pet Sitting in Jackson Heights: Care at Your Door</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet sitting Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">16</td><td class="px-4 py-3 text-white text-xs font-medium">Separation Anxiety in Dogs: Signs & How Regular Walks Help</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog separation anxiety walks</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">17</td><td class="px-4 py-3 text-white text-xs font-medium">Cat Sitting in Queens: Why Your Cat Needs an In-Home Sitter</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comm</span></td><td class="px-4 py-3 text-slate-400 text-xs">cat sitting Queens NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">18</td><td class="px-4 py-3 text-white text-xs font-medium">Holiday Pet Care in NYC: Planning for Thanksgiving & Christmas</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">holiday pet care NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">19</td><td class="px-4 py-3 text-white text-xs font-medium">Pet Care Near the 7 Train: Serving Corona, Woodside & Elmhurst</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet care Corona Woodside Queens</td></tr>
                    <tr><td class="px-3 py-3 text-center text-slate-500 text-xs">20</td><td class="px-4 py-3 text-white text-xs font-medium">Why Kwoof? Meet Stephanie & the Story Behind K-Woof Pet Care</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comm</span></td><td class="px-4 py-3 text-slate-400 text-xs">Kwoof pet care reviews</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-4">Strategic Content Distribution</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-blue-400 mb-1">7</div>
                <div class="text-xs text-slate-400">Informational Articles</div>
                <div class="text-[10px] text-slate-500 mt-1">35% — Attract massive traffic</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2"><div class="bg-blue-500 h-2 rounded-full" style="width: 35%"></div></div>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-amber-400 mb-1">7</div>
                <div class="text-xs text-slate-400">Commercial Articles</div>
                <div class="text-[10px] text-slate-500 mt-1">35% — Position as the expert</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2"><div class="bg-amber-500 h-2 rounded-full" style="width: 35%"></div></div>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-green-400 mb-1">6</div>
                <div class="text-xs text-slate-400">Transactional Articles</div>
                <div class="text-[10px] text-slate-500 mt-1">30% — Generate direct bookings</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2"><div class="bg-green-500 h-2 rounded-full" style="width: 30%"></div></div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 5: INVESTMENT ==================== -->
<div id="tab-inversion" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-4">Phase 1 — Fix the Foundation (Weeks 1-2)</h2>
    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #3b82f6;">
        <p class="text-slate-400 text-sm mb-4">These are the critical first steps to make your business visible online:</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Create your <strong class="text-white">Google Business Profile</strong> — appear on Google Maps</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Fix <strong class="text-white">page titles</strong> with location (Queens, Brooklyn, NYC)</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Fix <strong class="text-white">duplicate pages</strong> (redirect /home to /)</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Add <strong class="text-white">LocalBusiness data</strong> so Google knows your name, address, phone, and hours</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Create profiles on <strong class="text-white">Yelp, Nextdoor, and Facebook</strong></p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Fix typo, Gallery title, and add <strong class="text-white">contact form</strong></p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2 md:col-span-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Start <strong class="text-white">review collection strategy</strong> — ask every happy client to leave a Google review. Connect your <a href="https://www.timetopet.com/portal/kwoofpetcare/create-account" target="_blank" class="text-blue-400 hover:text-blue-300 underline">TimeToPet booking system</a> to make the process seamless.</p>
            </div>
        </div>
    </div>

    <h2 class="text-white text-lg font-bold mb-4">Phase 2 — SEO Growth Plan (6 Months to Dominate Local Search)</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-1">Monthly Payment</h3>
            <div class="flex items-baseline gap-1 mb-2">
                <span class="text-3xl font-extrabold text-white">$180</span>
                <span class="text-slate-400 text-sm">/month</span>
            </div>
            <p class="text-slate-400 text-sm mb-4">x 6 months = <strong class="text-white">$1,080 total</strong></p>
            <div class="glass-lighter rounded-lg px-4 py-2"><p class="text-slate-400 text-xs">Minimum commitment: 6 months</p></div>
        </div>
        <div class="glass rounded-2xl p-6 relative" style="border: 2px solid rgba(34, 197, 94, 0.4);">
            <div class="absolute -top-3 right-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-500/20 text-green-400 border border-green-500/30">Save $200</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-1">One-Time Payment</h3>
            <div class="flex items-baseline gap-1 mb-2">
                <span class="text-3xl font-extrabold text-green-400">$880</span>
                <span class="text-slate-400 text-sm">single payment</span>
            </div>
            <p class="text-slate-400 text-sm mb-2">Full 6-month coverage</p>
            <p class="text-green-400 text-sm font-semibold">You save $200</p>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">What is included in both plans?</h3>
        <div class="space-y-3">
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">20 new blog articles every month</strong> to help Google find your business (120 articles in 6 months)</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Dedicated pages for each service</strong> (dog walking, pet sitting, boarding) and each neighborhood</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Google Business Profile management</strong> — weekly posts, photos, Q&A</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Monthly reports</strong> showing how many people found you, what they searched, and how many contacted you</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Technical SEO fixes</strong> and <strong class="text-white">continuous support</strong> for 6 months</p>
            </div>
        </div>
    </div>

    <!-- Projection -->
    <h2 class="text-white text-lg font-bold mb-4">Projected Results — 6 Months</h2>
    <div class="glass rounded-2xl p-6 mb-6">
        <canvas id="projectionChart" height="300"></canvas>
    </div>
    <div class="glass rounded-2xl p-5 mb-8">
        <p class="text-slate-400 text-xs leading-relaxed">Conservative projections based on average SEO performance for local pet care businesses in NYC. Results depend on consistency, competition, and review generation. Source: Creative Web campaign averages.</p>
    </div>

    <!-- CTA -->
    <div class="glass rounded-2xl p-8 text-center mb-8" style="border: 2px solid rgba(59, 130, 246, 0.3);">
        <h3 class="text-white text-xl font-bold mb-2">Ready to Start Getting More Clients?</h3>
        <p class="text-slate-400 text-sm mb-6">Every day without SEO is another day competitors are getting YOUR clients. Let us start building your online presence today.</p>
        <a href="https://www.timetopet.com/portal/kwoofpetcare/create-account" target="_blank" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Book a Meet & Greet
        </a>
    </div>
</div>

</main>

<!-- FOOTER -->
<footer class="relative z-10 glass border-t border-slate-700/50 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-xs mb-1">Developed by <span class="text-slate-400 font-medium">Creative Web</span> — <a href="https://creativeweb.com.ec" class="text-blue-400 hover:text-blue-300 transition-colors" target="_blank">creativeweb.com.ec</a></p>
        <p class="text-slate-600 text-[10px]">Report generated: April 7, 2026</p>
    </div>
</footer>

<script>
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + tabId).classList.add('active');
    const buttons = document.querySelectorAll('.tab-btn');
    const tabMap = ['resumen', 'perdidas', 'fortalezas', 'contenido', 'inversion'];
    const idx = tabMap.indexOf(tabId);
    if (idx >= 0) buttons[idx].classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
    if (tabId === 'resumen') renderScoreChart();
    if (tabId === 'inversion') renderProjectionChart();
}

function renderScoreChart() {
    const ctx = document.getElementById('scoreChart');
    if (!ctx) return;
    if (ctx._chartInstance) ctx._chartInstance.destroy();
    ctx._chartInstance = new Chart(ctx, {
        type: 'doughnut',
        data: { datasets: [{ data: [25, 75], backgroundColor: ['#ef4444', 'rgba(51,65,85,0.3)'], borderWidth: 0, cutout: '78%' }] },
        options: { responsive: false, plugins: { legend: { display: false }, tooltip: { enabled: false } }, animation: { animateRotate: true, duration: 1200 } }
    });
}

function renderProjectionChart() {
    const ctx = document.getElementById('projectionChart');
    if (!ctx) return;
    if (ctx._chartInstance) ctx._chartInstance.destroy();
    ctx._chartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Now', 'Month 1', 'Month 2', 'Month 3', 'Month 4', 'Month 5', 'Month 6'],
            datasets: [
                { label: 'Monthly website visits', data: [50, 150, 350, 600, 1000, 1500, 2200], borderColor: '#3b82f6', backgroundColor: 'rgba(59,130,246,0.1)', fill: true, tension: 0.4, pointBackgroundColor: '#3b82f6', pointBorderColor: '#fff', pointBorderWidth: 2, pointRadius: 5 },
                { label: 'New clients/month', data: [2, 5, 10, 18, 28, 40, 55], borderColor: '#22c55e', backgroundColor: 'rgba(34,197,94,0.08)', fill: true, tension: 0.4, pointBackgroundColor: '#22c55e', pointBorderColor: '#fff', pointBorderWidth: 2, pointRadius: 5, yAxisID: 'y1' }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { labels: { color: '#94a3b8', font: { family: 'Inter', size: 12 } } }, tooltip: { backgroundColor: 'rgba(15,23,42,0.9)', titleColor: '#e2e8f0', bodyColor: '#94a3b8', borderColor: 'rgba(148,163,184,0.2)', borderWidth: 1 } },
            scales: {
                x: { ticks: { color: '#64748b', font: { family: 'Inter', size: 11 } }, grid: { color: 'rgba(148,163,184,0.06)' } },
                y: { position: 'left', ticks: { color: '#64748b', font: { family: 'Inter', size: 11 }, callback: v => v.toLocaleString() + ' visits' }, grid: { color: 'rgba(148,163,184,0.06)' } },
                y1: { position: 'right', ticks: { color: '#22c55e', font: { family: 'Inter', size: 11 }, callback: v => v + ' clients' }, grid: { display: false } }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', function() { renderScoreChart(); });
</script>
</body>
</html>
