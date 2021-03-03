<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-13 00:15:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:15:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:22:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:23:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 00:23:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:36:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:40:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:40:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:42:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:43:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:43:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 00:43:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:46:44 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:47:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:48:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:53:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:53:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 00:53:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 00:54:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 00:54:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:08:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:08:21 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 01:08:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:15:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:15:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 01:15:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:22:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:22:31 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 01:22:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:29:57 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:30:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 01:30:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:44:54 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-13 01:57:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:57:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-13 01:57:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 01:57:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-13 08:31:36 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-13 10:29:40 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-13 17:59:48 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-13 18:13:08 --> 404 Page Not Found: Robotstxt/index
