-- {\rtf1\ansi\ansicpg1252\cocoartf2577
-- \cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
-- {\colortbl;\red255\green255\blue255;}
-- {\*\expandedcolortbl;;}
-- \paperw11900\paperh16840\margl1440\margr1440\vieww11520\viewh8400\viewkind0
-- \pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0

-- \f0\fs24 \cf0
-- phpMyAdmin SQL Dump\
-- version 4.9.7\
-- https://www.phpmyadmin.net/\
--\
-- H\'f4te : localhost:8889\
-- G\'e9n\'e9r\'e9 le : ven. 26 mars 2021 \'e0 11:31\
-- Version du serveur :  5.7.32\
-- Version de PHP : 7.4.12\
\
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";\
SET time_zone = "+00:00";\
\
--\
-- Base de donn\'e9es : `livac`\
--\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `apinews`\
--\
\
CREATE TABLE `apinews` (\
  `id` int(11) NOT NULL,\
  `date` datetime DEFAULT NULL,\
  `json` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)'\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `article`\
--\
\
CREATE TABLE `article` (\
  `id` int(11) NOT NULL,\
  `category_id` int(11) DEFAULT NULL,\
  `section_id` int(11) DEFAULT NULL,\
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,\
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `entete` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` datetime NOT NULL,\
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- D\'e9chargement des donn\'e9es de la table `article`\
--\
\
INSERT INTO `article` (`id`, `category_id`, `section_id`, `title`, `content`, `image`, `entete`, `created_at`, `author`) VALUES\
(13, 2, 1, 'uytreza', 'azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.azertyuiop qsdfghjkl.m wxcvbn azertyuiop.', '7eac9590cef507d4f2e0ff183c2348dc.jpeg', 'azertyuiop qsdfghjkl.m wxcvbn azertyuiop.', '2021-03-15 18:02:21', 'azertyuiop qsdfghjkl.m wxcvbn azertyuiop.'),\
(21, 5, 1, 'test de l\\'uploader d\\'images', 'test de l\\'uploader d\\'images. test de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'imagestest de l\\'uploader d\\'images.', '49b226671aac402160dedfd4e413221a.jpeg', 'test de l\\'uploader d\\'images', '2021-03-19 16:12:02', 'ljgr jgeof'),\
(22, 1, 5, 'Article test positionnement section + cat\'e9gorie', 'Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.Article test positionnement section + cat\'e9gorie. Article test positionnement section + cat\'e9gorie.', '71459a083982f4b395e954d4c4634c17.jpeg', 'Article test positionnement section + cat\'e9gorie', '2021-03-19 16:31:57', 'Dev Web'),\
(23, 5, 5, 'Article Opinion 1', 'Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion. Il ne sera donc pas plac\'e9 autre part que dans la section pr\'e9cis\'e9e par ce formulaire.', '8943b32825c73b0dab56ea16b6643f9a.jpeg', 'Cet article va \'eatre plac\'e9 dans la cat\'e9gorie Opinion.', '2021-03-19 17:14:54', 'Dev Web'),\
(24, 6, 5, 'Article Economie 1', 'Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site. Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.', '977ac5c08ed45e5249aacb46e896bcab.jpeg', 'Cet article va \'eatre plac\'e9 dans la cat\'e9gorie \'c9conomie, plus pr\'e9cis\'e9ment dans la section Cat\'e9gories du site.', '2021-03-19 17:21:12', 'Dev Web'),\
(25, 5, 5, 'Article Opinion 2', 'Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.', '0a27eecf96e0cb89d63d35f23b445548.jpeg', 'Deuxi\'e8me article de la colonne opinion. \'c0 tester pour le positionnement cat\'e9gories.', '2021-03-19 18:30:19', 'Dev Web'),\
(26, 6, 5, 'Test du nouveau code de l\\'uploader d\\'images', 'Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images. Test du nouveau code de l\\'uploader d\\'images.', 'cd6efd60a0838712e7af3dd6c7616365.jpeg', 'Test du nouveau code de l\\'uploader d\\'images.', '2021-03-24 08:50:04', 'Dev Web'),\
(28, 2, 1, 'Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images...', 'Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images... Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images...', 'd2390490f596abdd729a3baf402ca700.jpeg', 'Test num\'e9ro je ne plus combien pour tester le nouveau code de l\\'uploader d\\'images...', '2021-03-24 10:36:28', 'Dev Web'),\
(30, 5, 2, 'Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.', 'Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.', 'eb15bbee2e4bf205deb0651da8a0c72f.jpeg', 'Cr\'e9ation d\\'un nouvel article apr\'e8s la division des deux routes.', '2021-03-24 15:41:02', 'Dev Web');\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `category`\
--\
\
CREATE TABLE `category` (\
  `id` int(11) NOT NULL,\
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- D\'e9chargement des donn\'e9es de la table `category`\
--\
\
INSERT INTO `category` (`id`, `title`) VALUES\
(1, 'Politique'),\
(2, 'Droit du travail'),\
(5, 'Opinions'),\
(6, '\'c9conomie'),\
(7, 'Soci\'e9t\'e9');\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `comment`\
--\
\
CREATE TABLE `comment` (\
  `id` int(11) NOT NULL,\
  `article_id` int(11) NOT NULL,\
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` datetime NOT NULL,\
  `signalement` int(11) DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `doctrine_migration_versions`\
--\
\
CREATE TABLE `doctrine_migration_versions` (\
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,\
  `executed_at` datetime DEFAULT NULL,\
  `execution_time` int(11) DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;\
\
--\
-- D\'e9chargement des donn\'e9es de la table `doctrine_migration_versions`\
--\
\
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES\
('DoctrineMigrations\\\\Version20210123173436', '2021-01-23 17:35:21', 296),\
('DoctrineMigrations\\\\Version20210304102306', '2021-03-04 10:23:41', 99),\
('DoctrineMigrations\\\\Version20210304102619', '2021-03-04 10:27:32', 83),\
('DoctrineMigrations\\\\Version20210304102753', '2021-03-04 10:28:06', 82),\
('DoctrineMigrations\\\\Version20210305110920', '2021-03-05 11:09:31', 75),\
('DoctrineMigrations\\\\Version20210305111512', '2021-03-05 11:15:45', 68),\
('DoctrineMigrations\\\\Version20210305111959', '2021-03-05 11:20:03', 61),\
('DoctrineMigrations\\\\Version20210309141305', '2021-03-09 14:13:18', 74),\
('DoctrineMigrations\\\\Version20210310092421', '2021-03-10 09:24:32', 101),\
('DoctrineMigrations\\\\Version20210310095148', '2021-03-10 09:51:59', 67),\
('DoctrineMigrations\\\\Version20210310103529', '2021-03-10 10:35:40', 65),\
('DoctrineMigrations\\\\Version20210310104053', '2021-03-10 10:40:58', 56),\
('DoctrineMigrations\\\\Version20210310105717', '2021-03-10 10:57:20', 46),\
('DoctrineMigrations\\\\Version20210310110832', '2021-03-10 11:08:39', 115),\
('DoctrineMigrations\\\\Version20210310141156', '2021-03-10 14:12:03', 69),\
('DoctrineMigrations\\\\Version20210310142413', '2021-03-10 14:24:18', 60),\
('DoctrineMigrations\\\\Version20210310165125', '2021-03-10 16:51:29', 73),\
('DoctrineMigrations\\\\Version20210310170057', '2021-03-10 17:01:01', 59),\
('DoctrineMigrations\\\\Version20210311161824', '2021-03-11 16:18:28', 75),\
('DoctrineMigrations\\\\Version20210312103109', '2021-03-12 10:31:12', 92),\
('DoctrineMigrations\\\\Version20210312103722', '2021-03-12 10:37:25', 73),\
('DoctrineMigrations\\\\Version20210312105514', '2021-03-12 10:55:17', 67),\
('DoctrineMigrations\\\\Version20210324164305', '2021-03-24 16:43:18', 125),\
('DoctrineMigrations\\\\Version20210325154806', '2021-03-25 15:48:17', 105);\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `section`\
--\
\
CREATE TABLE `section` (\
  `id` int(11) NOT NULL,\
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- D\'e9chargement des donn\'e9es de la table `section`\
--\
\
INSERT INTO `section` (`id`, `title`) VALUES\
(1, 'Main'),\
(2, '\'c0 lire'),\
(5, 'Cat\'e9gorie'),\
(6, 'TEST');\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `sessions`\
--\
\
CREATE TABLE `sessions` (\
  `sess_id` varbinary(128) NOT NULL,\
  `sess_data` blob NOT NULL,\
  `sess_lifetime` int(10) UNSIGNED NOT NULL,\
  `sess_time` int(10) UNSIGNED NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;\
\
--\
-- D\'e9chargement des donn\'e9es de la table `sessions`\
--\
\
INSERT INTO `sessions` (`sess_id`, `sess_data`, `sess_lifetime`, `sess_time`) VALUES\
(0x6534393063313537663363326463363563623136636237303563346639323832, 0x5f7366325f617474726962757465737c613a333a7b733a31303a225f637372662f666f726d223b733a34333a227a554e715a7659386e495570315a4b523971634e58776e3056667a672d4c2d6259466c3737685f5a4e3545223b733a31343a225f73656375726974795f6d61696e223b733a3437343a22433a37343a2253796d666f6e795c436f6d706f6e656e745c53656375726974795c436f72655c41757468656e7469636174696f6e5c546f6b656e5c557365726e616d6550617373776f7264546f6b656e223a3338363a7b613a333a7b693a303b4e3b693a313b733a343a226d61696e223b693a323b613a353a7b693a303b4f3a31363a224170705c456e746974795c5573657273223a353a7b733a32303a22004170705c456e746974795c5573657273006964223b693a313b733a32333a22004170705c456e746974795c557365727300656d61696c223b733a31343a2261646d696e40746573742e636f6d223b733a32363a22004170705c456e746974795c557365727300757365726e616d65223b733a393a224761627269656c6c65223b733a32363a22004170705c456e746974795c55736572730070617373776f7264223b733a36303a22243279243133246253592e787a33655367794c484e66516b78776c7a4f61305a3046764e416638536c5a354a4b75355632774b2e396b5644456b4257223b733a31363a22636f6e6669726d5f70617373776f7264223b4e3b7d693a313b623a313b693a323b4e3b693a333b613a303a7b7d693a343b613a313a7b693a303b733a393a22524f4c455f55534552223b7d7d7d7d223b733a31333a225f637372662f61727469636c65223b733a34333a227645676b77444a2d574c7a30456b5071626b725370396d5a6956454d47556e6b4148486e6563692d316d59223b7d5f7366325f6d6574617c613a333a7b733a313a2275223b693a313631363638373637333b733a313a2263223b693a313631363638343731343b733a313a226c223b733a313a2230223b7d, 1616689113, 1616687673),\
(0x6662373432653033643966326662613939653466653862656134346634643236, 0x5f7366325f617474726962757465737c613a313a7b733a31333a225f637372662f61727469636c65223b733a34333a2251477742736d3156786a41364f6146533358474a493539494a4b5f784250505137527a6d412d6e34336c51223b7d5f7366325f6d6574617c613a333a7b733a313a2275223b693a313631363735353532323b733a313a2263223b693a313631363735353034353b733a313a226c223b733a313a2230223b7d, 1616756962, 1616755522);\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `users`\
--\
\
CREATE TABLE `users` (\
  `id` int(11) NOT NULL,\
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- D\'e9chargement des donn\'e9es de la table `users`\
--\
\
INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES\
(1, 'admin@test.com', 'Gabrielle', '$2y$13$bSY.xz3eSgyLHNfQkxwlzOa0Z0FvNAf8SlZ5JKu5V2wK.9kVDEkBW');\
\
--\
-- Index pour les tables d\'e9charg\'e9es\
--\
\
--\
-- Index pour la table `apinews`\
--\
ALTER TABLE `apinews`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Index pour la table `article`\
--\
ALTER TABLE `article`\
  ADD PRIMARY KEY (`id`),\
  ADD KEY `IDX_23A0E6612469DE2` (`category_id`),\
  ADD KEY `IDX_23A0E66D823E37A` (`section_id`);\
\
--\
-- Index pour la table `category`\
--\
ALTER TABLE `category`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Index pour la table `comment`\
--\
ALTER TABLE `comment`\
  ADD PRIMARY KEY (`id`),\
  ADD KEY `IDX_9474526C7294869C` (`article_id`);\
\
--\
-- Index pour la table `doctrine_migration_versions`\
--\
ALTER TABLE `doctrine_migration_versions`\
  ADD PRIMARY KEY (`version`);\
\
--\
-- Index pour la table `section`\
--\
ALTER TABLE `section`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Index pour la table `sessions`\
--\
ALTER TABLE `sessions`\
  ADD PRIMARY KEY (`sess_id`);\
\
--\
-- Index pour la table `users`\
--\
ALTER TABLE `users`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- AUTO_INCREMENT pour les tables d\'e9charg\'e9es\
--\
\
--\
-- AUTO_INCREMENT pour la table `apinews`\
--\
ALTER TABLE `apinews`\
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;\
\
--\
-- AUTO_INCREMENT pour la table `article`\
--\
ALTER TABLE `article`\
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;\
\
--\
-- AUTO_INCREMENT pour la table `category`\
--\
ALTER TABLE `category`\
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;\
\
--\
-- AUTO_INCREMENT pour la table `comment`\
--\
ALTER TABLE `comment`\
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;\
\
--\
-- AUTO_INCREMENT pour la table `section`\
--\
ALTER TABLE `section`\
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;\
\
--\
-- AUTO_INCREMENT pour la table `users`\
--\
ALTER TABLE `users`\
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;\
\
--\
-- Contraintes pour les tables d\'e9charg\'e9es\
--\
\
--\
-- Contraintes pour la table `article`\
--\
ALTER TABLE `article`\
  ADD CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),\
  ADD CONSTRAINT `FK_23A0E66D823E37A` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);\
\
--\
-- Contraintes pour la table `comment`\
--\
ALTER TABLE `comment`\
  ADD CONSTRAINT `FK_9474526C7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);\
}