
<h2><?php echo htmlentities($_POST["nickname"], ENT_QUOTES, "UTF-8");  ?>さんのプロフィールページ</h2>

<?php
/*
 * 入力：あああ
 * あああさんのプロフィールページ
 *
 * 入力：<script>alert("xss");</script>
 * <script>alert("xss");</script>さんのプロフィールページ　　対策済み
 */