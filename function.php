<?php

/**
 * Database connection
 *
 * @return PDO
 */
function db_connect()
{
    $db = parse_ini_file('my_setting.ini');
    $dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['schema'] . ';charset=utf8';
    try {
        return new PDO($dsn, $db['user'], $db['password']);
    } catch (PDOException $e) {
        exit('Database connection failed: ' . $e->getMessage());
    }
}

/**
 * Get all posts
 *
 * @return array
 */
function get_all_posts()
{
    $pdo = db_connect();
    $stmt = $pdo->query('SELECT * FROM posts');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Get posts with likes
 *
 * @return array
 */
function get_like_posts()
{
    $pdo = db_connect();
    $stmt = $pdo->query('SELECT * FROM posts WHERE likes = 1');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Toggle like status
 *
 * @param $post_id
 * @return boolean
 */
function toggle_like($post_id)
{
    $pdo = db_connect();
    $stmt = $pdo->prepare('SELECT likes FROM posts WHERE id = :post_id');
    $stmt->bindParam(':post_id', $post_id);
    $stmt->execute();

    $likes = $stmt->fetchColumn();
    $new_likes = $likes ? 0 : 1;

    $stmt = $pdo->prepare('UPDATE posts SET likes = :likes WHERE id = :post_id');
    $stmt->bindParam(':likes', $new_likes);
    $stmt->bindParam(':post_id', $post_id);
    return $stmt->execute();
}

/**
 * Create a new post
 *
 * @param $text
 * @param $image
 * @return boolean
 */
function create($text, $image)
{    
    $pdo = db_connect();
    $stmt = $pdo->prepare('INSERT INTO posts (text, image) VALUES (:text, :image)');
    $stmt->bindParam(':text', $text);
    $stmt->bindParam(':image', $image);
    return $stmt->execute();
}

/**
 * Delete a post
 *
 * @param $post_id
 * @return boolean
 */
function delete($post_id)
{
    $pdo = db_connect();
    $stmt = $pdo->prepare('DELETE FROM posts WHERE id = :post_id');
    return $stmt->execute(['post_id' => $post_id]);
}