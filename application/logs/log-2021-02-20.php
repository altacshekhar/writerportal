<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-20 00:01:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:06:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:08:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:08:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:08:37 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:29:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:29:31 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 40
ERROR - 2021-02-20 00:30:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-20 00:30:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-20 00:30:30 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 30
ERROR - 2021-02-20 00:30:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:30:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'zipchecklist.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:54:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:54:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'zipchecklist.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:54:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'zipchecklist.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:59:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 00:59:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 01:07:44 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 03:16:34 --> 404 Page Not Found: Git/HEAD
ERROR - 2021-02-20 06:10:55 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-20 07:19:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%res%'
OR article_user.user_email ILIKE '%res%'
OR article_user.user_fname ILIKE '%res%'
OR article_user.user_lname ILIKE '%res%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%res%'
OR article_user.user_email ILIKE '%res%'
OR article_user.user_fname ILIKE '%res%'
OR article_user.user_lname ILIKE '%res%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%rest%'
OR article_user.user_email ILIKE '%rest%'
OR article_user.user_fname ILIKE '%rest%'
OR article_user.user_lname ILIKE '%rest%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restauran%'
OR article_user.user_email ILIKE '%restauran%'
OR article_user.user_fname ILIKE '%restauran%'
OR article_user.user_lname ILIKE '%restauran%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restau%'
OR article_user.user_email ILIKE '%restau%'
OR article_user.user_fname ILIKE '%restau%'
OR article_user.user_lname ILIKE '%restau%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restau%'
OR article_user.user_email ILIKE '%restau%'
OR article_user.user_fname ILIKE '%restau%'
OR article_user.user_lname ILIKE '%restau%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restauran%'
OR article_user.user_email ILIKE '%restauran%'
OR article_user.user_fname ILIKE '%restauran%'
OR article_user.user_lname ILIKE '%restauran%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant %'
OR article_user.user_email ILIKE '%restaurant %'
OR article_user.user_fname ILIKE '%restaurant %'
OR article_user.user_lname ILIKE '%restaurant %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restauran%'
OR article_user.user_email ILIKE '%restauran%'
OR article_user.user_fname ILIKE '%restauran%'
OR article_user.user_lname ILIKE '%restauran%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%rest%'
OR article_user.user_email ILIKE '%rest%'
OR article_user.user_fname ILIKE '%rest%'
OR article_user.user_lname ILIKE '%rest%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant or%'
OR article_user.user_email ILIKE '%restaurant or%'
OR article_user.user_fname ILIKE '%restaurant or%'
OR article_user.user_lname ILIKE '%restaurant or%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant %'
OR article_user.user_email ILIKE '%restaurant %'
OR article_user.user_fname ILIKE '%restaurant %'
OR article_user.user_lname ILIKE '%restaurant %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant org%'
OR article_user.user_email ILIKE '%restaurant org%'
OR article_user.user_fname ILIKE '%restaurant org%'
OR article_user.user_lname ILIKE '%restaurant org%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organi%'
OR article_user.user_email ILIKE '%restaurant organi%'
OR article_user.user_fname ILIKE '%restaurant organi%'
OR article_user.user_lname ILIKE '%restaurant organi%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant orga%'
OR article_user.user_email ILIKE '%restaurant orga%'
OR article_user.user_fname ILIKE '%restaurant orga%'
OR article_user.user_lname ILIKE '%restaurant orga%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organiz%'
OR article_user.user_email ILIKE '%restaurant organiz%'
OR article_user.user_fname ILIKE '%restaurant organiz%'
OR article_user.user_lname ILIKE '%restaurant organiz%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant or%'
OR article_user.user_email ILIKE '%restaurant or%'
OR article_user.user_fname ILIKE '%restaurant or%'
OR article_user.user_lname ILIKE '%restaurant or%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organizatio%'
OR article_user.user_email ILIKE '%restaurant organizatio%'
OR article_user.user_fname ILIKE '%restaurant organizatio%'
OR article_user.user_lname ILIKE '%restaurant organizatio%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organiz%'
OR article_user.user_email ILIKE '%restaurant organiz%'
OR article_user.user_fname ILIKE '%restaurant organiz%'
OR article_user.user_lname ILIKE '%restaurant organiz%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organiza%'
OR article_user.user_email ILIKE '%restaurant organiza%'
OR article_user.user_fname ILIKE '%restaurant organiza%'
OR article_user.user_lname ILIKE '%restaurant organiza%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 07:19:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-20 09:56:29 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-20 09:56:29 --> Query error: ERROR:  zero-length delimited identifier at or near """"
LINE 3: WHERE "user_email" = ""
                             ^ - Invalid query: SELECT *
FROM "article_user"
WHERE "user_email" = ""
ERROR - 2021-02-20 09:56:29 --> Severity: error --> Exception: Call to a member function row() on boolean /var/www/html/writerportal/application/core/MY_Model.php 81
ERROR - 2021-02-20 11:45:13 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-20 13:47:10 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-20 15:50:15 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-20 18:32:40 --> 404 Page Not Found: Robotstxt/index
