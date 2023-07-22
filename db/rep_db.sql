-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 05:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rep_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `center_id` int(11) NOT NULL,
  `center_name` varchar(200) NOT NULL,
  `center_head_id` int(11) NOT NULL,
  `center_cluster_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`center_id`, `center_name`, `center_head_id`, `center_cluster_id`) VALUES
(1, 'Khayam', 2, 1),
(2, 'Khanyar', 2, 1),
(3, 'Rajbagh', 2, 1),
(4, 'Sonwar', 2, 1),
(5, 'Pirbagh', 5, 1),
(6, 'Dalgate', 5, 1),
(7, 'Hyderpora(Ibrahim-Colony)', 5, 1),
(8, 'Mallabagh', 10, 2),
(9, 'Anchaar', 10, 2),
(10, 'Nowshera', 10, 2),
(11, 'Akhoon Mohalla', 10, 2),
(12, 'Rajouri-kadal', 11, 2),
(13, 'Hawal', 11, 2),
(14, 'Alam Gari Bazar', 11, 2),
(15, 'Guzarbal', 12, 3),
(16, 'Firdous Colony', 12, 3),
(17, 'Chinar Mohalla', 13, 3),
(18, 'Noorbagh', 12, 3),
(19, 'SDA colony A', 13, 3),
(20, 'Wanganpora Eidgah', 14, 3),
(21, 'Aali Masjid', 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `cluster_id` int(11) NOT NULL,
  `cluster_name` varchar(200) NOT NULL,
  `cluster_org_id` int(11) NOT NULL,
  `cluster_head_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`cluster_id`, `cluster_name`, `cluster_org_id`, `cluster_head_id`) VALUES
(1, 'Dalgate', 1, 4),
(2, 'Hawal', 1, 6),
(3, 'Qamarwari', 1, 7),
(4, 'Parimpora', 1, 8),
(5, 'Nowpora', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `f_email` varchar(50) NOT NULL,
  `f_phone` varchar(10) NOT NULL,
  `f_subject` varchar(100) NOT NULL,
  `f_message` text NOT NULL,
  `f_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `f_read` tinyint(1) NOT NULL DEFAULT '0',
  `f_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`f_id`, `f_name`, `f_email`, `f_phone`, `f_subject`, `f_message`, `f_date`, `f_read`, `f_status`) VALUES
(1, 'Demo', 'demo@email.com', '1234567890', '', 'nbvjxkcvjdshfkjdshjksdhfjkdsf\r\ndfsdkjfdsfsd\r\nfsdfjsdf\r\ndsfbsdf\r\nsdfdsf\r\nsdfsdgfd', '2020-04-23 12:22:20', 1, 1),
(3, 'Demo 2', 'demo2@gmail.com', '9797563423', '', ' I have facing problem regarding dash dash.', '2020-04-23 12:55:46', 1, 1),
(5, 'qwertyui', 'qwertyu@qwert.com', '1234567890', 'Demo Subject From Demo', 'Wel come kto the of the an dis the wi thwe skdhaskhd sdfkhsdhf l', '2020-04-28 19:01:24', 1, 1),
(6, 'qwerty', 'qwerty@qwerty.com', '4567654567', 'dfhgffid fiusfiudsy fidsyfi', 'iyif yeifyiusdfyisdy fidsiufyseiufy ieyfiew', '2020-04-28 01:52:13', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) UNSIGNED NOT NULL,
  `phrase` text NOT NULL,
  `english` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`) VALUES
(19, 'email', 'Email Address'),
(20, 'password', 'Password'),
(21, 'login', 'Log In'),
(22, 'incorrect_email_password', 'Incorrect Email/Password!'),
(23, 'user_role', 'User Role'),
(24, 'please_login', 'Please Log In'),
(25, 'settings', 'Settings'),
(26, 'profile', 'Profile'),
(27, 'logout', 'Log Out'),
(28, 'please_try_again', 'Please Try Again'),
(29, 'admin', 'Admin'),
(30, 'doctor', 'Doctor'),
(31, 'representative', 'Representative'),
(32, 'dashboard', 'Dashboard'),
(33, 'department', 'Department'),
(34, 'add_department', 'Add Department'),
(35, 'department_list', 'Department List'),
(36, 'add_doctor', 'Add Doctor'),
(37, 'doctor_list', 'Doctor List'),
(38, 'add_representative', 'Add Representative'),
(39, 'representative_list', 'Representative List'),
(40, 'patient', 'Patient'),
(41, 'add_patient', 'Add Patient'),
(42, 'patient_list', 'Patient List'),
(43, 'schedule', 'Schedule'),
(44, 'add_schedule', 'Add Schedule'),
(45, 'schedule_list', 'Schedule List'),
(46, 'appointment', 'Appointment'),
(47, 'add_appointment', 'Add Appointment'),
(48, 'appointment_list', 'Appointment List'),
(49, 'enquiry', 'Enquiry'),
(50, 'language_setting', 'Language Setting'),
(51, 'appointment_report', 'Appointment Report'),
(52, 'assign_by_all', 'Assign by All'),
(53, 'assign_by_doctor', 'Assign by Doctor'),
(54, 'assign_to_doctor', 'Assign to Doctor'),
(55, 'assign_by_representative', 'Assign by Representative'),
(56, 'report', 'Report'),
(57, 'assign_by_me', 'Assign by Me'),
(58, 'assign_to_me', 'Assign to Me'),
(59, 'website', 'Website'),
(60, 'slider', 'Slider'),
(61, 'section', 'Section'),
(62, 'section_item', 'Section Item'),
(63, 'comments', 'Comment'),
(64, 'latest_enquiry', 'Latest Enquiry'),
(65, 'total_progress', 'Total Progress'),
(66, 'last_year_status', 'Showing status from the last year'),
(67, 'department_name', 'Department Name'),
(68, 'description', 'Description'),
(69, 'status', 'Status'),
(70, 'active', 'Active'),
(71, 'inactive', 'Inactive'),
(72, 'cancel', 'Cancel'),
(73, 'save', 'Save'),
(75, 'serial', 'SL.NO'),
(76, 'action', 'Action'),
(77, 'edit', 'Edit '),
(78, 'delete', 'Delete'),
(79, 'save_successfully', 'Save Successfully!'),
(80, 'update_successfully', 'Update Successfully!'),
(81, 'department_edit', 'Department Edit'),
(82, 'delete_successfully', 'Delete successfully!'),
(83, 'are_you_sure', 'Are You Sure ? '),
(84, 'first_name', 'First Name'),
(85, 'last_name', 'Last Name'),
(86, 'phone', 'Phone No'),
(87, 'mobile', 'Mobile No'),
(88, 'blood_group', 'Blood Group'),
(89, 'sex', 'Sex'),
(90, 'date_of_birth', 'Date of Birth'),
(91, 'address', 'Address'),
(92, 'invalid_picture', 'Invalid Picture'),
(93, 'doctor_profile', 'Doctor Profile'),
(94, 'edit_profile', 'Edit Profile'),
(95, 'edit_doctor', 'Edit Doctor'),
(98, 'designation', 'Designation'),
(99, 'short_biography', 'Short Biography'),
(100, 'picture', 'Picture'),
(101, 'specialist', 'Specialist'),
(102, 'male', 'Male'),
(103, 'female', 'Female'),
(104, 'education_degree', 'Education/Degree'),
(105, 'create_date', 'Create Date'),
(106, 'view', 'View'),
(107, 'doctor_information', 'Doctor Information'),
(108, 'update_date', 'Update Date'),
(109, 'print', 'Print'),
(110, 'representative_edit', 'Representative Edit'),
(112, 'patient_information', 'Patient Information'),
(113, 'other', 'Other'),
(114, 'patient_id', 'Patient ID'),
(115, 'age', 'Age'),
(116, 'patient_edit', 'Patient Edit'),
(117, 'id_no', 'ID No.'),
(118, 'select_option', 'Select Option'),
(119, 'doctor_name', 'Doctor Name'),
(120, 'day', 'Day'),
(121, 'start_time', 'Start Time'),
(122, 'end_time', 'End Time'),
(123, 'per_patient_time', 'Per Patient Time'),
(124, 'serial_visibility_type', 'Serial Visibility'),
(125, 'sequential', 'Sequential'),
(126, 'timestamp', 'Timestamp'),
(127, 'available_days', 'Available Days'),
(128, 'schedule_edit', 'Schedule Edit'),
(129, 'available_time', 'Available Time'),
(130, 'serial_no', 'Serial No'),
(131, 'problem', 'Problem'),
(132, 'appointment_date', 'Appointment Date'),
(133, 'you_are_already_registered', 'You Are Already Registered'),
(134, 'invalid_patient_id', 'Invalid patient ID'),
(135, 'invalid_input', 'Invalid Input'),
(137, 'no_doctor_available', 'No Doctor Available'),
(138, 'invalid_department', 'Invalid Department!'),
(139, 'no_schedule_available', 'No Schedule Available'),
(140, 'please_fillup_all_required_fields', 'Please fillup all required filelds'),
(141, 'appointment_id', 'Appointment ID'),
(142, 'schedule_time', 'Schedule Time'),
(143, 'appointment_information', 'Appointment Information'),
(144, 'full_name', 'Full Name'),
(145, 'read_unread', 'Read / Unread'),
(146, 'date', 'Date'),
(147, 'ip_address', 'IP Address'),
(148, 'user_agent', 'User Agent'),
(149, 'checked_by', 'Checked By'),
(150, 'enquiry_date', 'Enquirey Date'),
(152, 'enquiry_list', 'Enquiry List'),
(153, 'filter', 'Filter'),
(154, 'start_date', 'Start Date'),
(155, 'end_date', 'End Date'),
(156, 'application_title', 'Application Title'),
(157, 'favicon', 'Favicon'),
(158, 'logo', 'Logo'),
(159, 'footer_text', 'Footer Text'),
(160, 'language', 'Language'),
(161, 'appointment_assign_by_all', 'Appointment Assign by All'),
(162, 'appointment_assign_by_doctor', 'Appointment Assign by Doctor'),
(163, 'appointment_assign_by_representative', 'Appointment Assign by Representative'),
(164, 'appointment_assign_to_all_doctor', 'Appointment Assign to All Doctor'),
(165, 'appointment_assign_to_me', 'Appointment Assign to Me'),
(166, 'appointment_assign_by_me', 'Appointment Assign by Me'),
(167, 'type', 'Type'),
(168, 'website_title', 'Website Title'),
(169, 'invalid_logo', 'Invalid Logo'),
(170, 'details', 'Details'),
(171, 'website_setting', 'Website Setting'),
(172, 'submit_successfully', 'Submit Successfully!'),
(173, 'application_setting', 'Application Setting'),
(174, 'invalid_favicon', 'Invalid Favicon'),
(175, 'new_enquiry', 'New Enquiry'),
(176, 'information', 'Information'),
(177, 'home', 'Home'),
(178, 'select_department', 'Select Department'),
(179, 'select_doctor', 'Select Doctor'),
(180, 'select_representative', 'Select Representative'),
(181, 'post_id', 'Post ID'),
(182, 'thank_you_for_your_comment', 'Thank you for your comment!'),
(183, 'comment_id', 'Comment ID'),
(184, 'comment_status', 'Comment Status'),
(185, 'comment_added_successfully', 'Comment Added Successfully'),
(186, 'comment_remove_successfully', 'Comment Remove Successfully'),
(187, 'select_item', 'Section Item'),
(188, 'add_item', 'Add Item'),
(189, 'menu_name', 'Menu Name'),
(190, 'title', 'Title'),
(191, 'position', 'Position'),
(192, 'invalid_icon_image', 'Invalid Icon Image!'),
(193, 'about', 'About'),
(194, 'blog', 'Blog'),
(195, 'service', 'Service'),
(196, 'item_edit', 'Item Edit'),
(197, 'registration_successfully', 'Registration Successfully'),
(198, 'add_section', 'Add Section'),
(199, 'section_name', 'Section Name'),
(200, 'invalid_featured_image', 'Invalid Featured Image!'),
(201, 'section_edit', 'Section Edit'),
(202, 'meta_description', 'Meta Description'),
(203, 'twitter_api', 'Twitter Api'),
(204, 'google_map', 'Google Map'),
(205, 'copyright_text', 'Copyright Text'),
(206, 'facebook_url', 'Facebook URL'),
(207, 'twitter_url', 'Twitter URL'),
(208, 'vimeo_url', 'Vimeo URL'),
(209, 'instagram_url', 'Instagram Url'),
(210, 'dribbble_url', 'Dribbble URL'),
(211, 'skype_url', 'Skype URL'),
(212, 'add_slider', 'Add Slider'),
(213, 'subtitle', 'Sub Title'),
(214, 'slide_position', 'Slide Position'),
(215, 'invalid_image', 'Invalid Image'),
(216, 'image_is_required', 'Image is required'),
(217, 'slider_edit', 'Slider Edit'),
(218, 'meta_keyword', 'Meta Keyword'),
(219, 'year', 'Year'),
(220, 'month', 'Month'),
(221, 'recent_post', 'Recent Post'),
(222, 'leave_a_comment', 'Leave a Comment'),
(223, 'submit', 'Submit'),
(224, 'google_plus_url', 'Google Plus URL'),
(225, 'website_status', 'Website Status'),
(226, 'new_slide', 'New Slide'),
(227, 'new_section', 'New Section'),
(228, 'subtitle_description', 'Sub Title / Description'),
(229, 'featured_image', 'Featured Image'),
(230, 'new_item', 'New Item'),
(231, 'item_position', 'Item Position'),
(232, 'icon_image', 'Icon Image'),
(233, 'post_title', 'Post Title'),
(234, 'add_to_website', 'Add to Website'),
(235, 'read_more', 'Read More'),
(236, 'registration', 'Registration'),
(237, 'appointment_form', 'Appointment Form'),
(238, 'contact', 'Contact'),
(239, 'optional', 'Optional'),
(240, 'customer_comments', 'Customer Comments'),
(241, 'need_a_doctor_for_checkup', 'Need a Doctor for Check-up?'),
(242, 'just_make_an_appointment_and_you_are_done', 'JUST MAKE AN APPOINTMENT & YOU\'RE DONE ! '),
(243, 'get_an_appointment', 'Get an appointment'),
(244, 'latest_news', 'Latest News'),
(245, 'latest_tweet', 'Latest Tweet'),
(246, 'menu', 'Menu'),
(247, 'select_user_role', 'Select User Role'),
(248, 'site_align', 'Website Align'),
(249, 'right_to_left', 'Right to Left'),
(250, 'left_to_right', 'Left to Right'),
(251, 'account_manager', 'Account Manager'),
(252, 'add_invoice', 'Add Invoice'),
(253, 'invoice_list', 'Invoice List'),
(254, 'account_list', 'Account List'),
(255, 'add_account', 'Add Account'),
(256, 'account_name', 'Account Name'),
(257, 'credit', 'Credit'),
(258, 'debit', 'Debit'),
(259, 'account_edit', 'Account Edit'),
(260, 'quantity', 'Quantity'),
(261, 'price', 'Price'),
(262, 'total', 'Total'),
(263, 'remove', 'Remove'),
(264, 'add', 'Add'),
(265, 'subtotal', 'Sub Total'),
(266, 'vat', 'Vat'),
(267, 'grand_total', 'Grand Total'),
(268, 'discount', 'Discount'),
(269, 'paid', 'Paid'),
(270, 'due', 'Due'),
(271, 'reset', 'Reset'),
(272, 'add_or_remove', 'Add / Remove'),
(273, 'invoice', 'Invoice'),
(274, 'invoice_information', 'Invoice Information'),
(275, 'invoice_edit', 'Invoice Edit'),
(276, 'update', 'Update'),
(277, 'all', 'All'),
(278, 'patient_wise', 'Patient Wise'),
(279, 'account_wise', 'Account Wise'),
(280, 'debit_report', 'Debit Report'),
(281, 'credit_report', 'Credit Report'),
(282, 'payment_list', 'Payment List'),
(283, 'add_payment', 'Add Payment'),
(284, 'payment_edit', 'Payment Edit'),
(285, 'pay_to', 'Pay To'),
(286, 'amount', 'Amount'),
(287, 'bed_type', 'Bed Type'),
(288, 'bed_limit', 'Bed Capacity'),
(289, 'charge', 'Charge'),
(290, 'bed_list', 'Bed List'),
(291, 'add_bed', 'Add Bed'),
(292, 'bed_manager', 'Bed Manager'),
(293, 'bed_edit', 'Bed Edit'),
(294, 'bed_assign', 'Bed Assign'),
(295, 'assign_date', 'Assign Date'),
(296, 'discharge_date', 'Discharge Date'),
(297, 'bed_assign_list', 'Bed Assign List'),
(298, 'assign_by', 'Assign By'),
(299, 'bed_available', 'Bed is Available'),
(300, 'bed_not_available', 'Bed is Not Available'),
(301, 'invlid_input', 'Invalid Input'),
(302, 'allocated', 'Allocated'),
(303, 'free_now', 'Free'),
(304, 'select_only_avaiable_days', 'Select Only Avaiable Days'),
(305, 'human_resources', 'Human Resources'),
(306, 'nurse_list', 'Nurse List'),
(307, 'add_employee', 'Add Employee'),
(308, 'user_type', 'User Type'),
(309, 'employee_information', 'Employee Information'),
(310, 'employee_edit', 'Edit Employee'),
(311, 'laboratorist_list', 'Laboratorist List'),
(312, 'accountant_list', 'Accountant List'),
(313, 'receptionist_list', 'Receptionist List'),
(314, 'pharmacist_list', 'Pharmacist List'),
(315, 'nurse', 'Nurse'),
(316, 'laboratorist', 'Laboratorist'),
(317, 'pharmacist', 'Pharmacist'),
(318, 'accountant', 'Accountant'),
(319, 'receptionist', 'Receptionist'),
(320, 'noticeboard', 'Noticeboard'),
(321, 'notice_list', 'Notice List'),
(322, 'add_notice', 'Add Notice'),
(323, 'hospital_activities', 'Hospital Activities'),
(324, 'death_report', 'Death Report'),
(325, 'add_death_report', 'Add Death Report'),
(326, 'death_report_edit', 'Death Report Edit'),
(327, 'birth_report', 'Birth Report'),
(328, 'birth_report_edit', 'Birth Report Edit'),
(329, 'add_birth_report', 'Add Birth Report'),
(330, 'add_operation_report', 'Add Operation Report'),
(331, 'operation_report', 'Operation Report'),
(332, 'investigation_report', 'Investigation Report'),
(333, 'add_investigation_report', 'Add Investigation Report'),
(334, 'add_medicine_category', 'Add Medicine Category'),
(335, 'medicine_category_list', 'Medicine Category List'),
(336, 'category_name', 'Category Name'),
(337, 'medicine_category_edit', 'Medicine Category Edit'),
(338, 'add_medicine', 'Add Medicine'),
(339, 'medicine_list', 'Medicine List'),
(340, 'medicine_edit', 'Medicine Edit'),
(341, 'manufactured_by', 'Manufactured By'),
(342, 'medicine_name', 'Medicine Name'),
(343, 'messages', 'Messages'),
(344, 'inbox', 'Inbox'),
(345, 'sent', 'Sent'),
(346, 'new_message', 'New Message'),
(347, 'sender', 'Sender Name'),
(349, 'message', 'Message'),
(350, 'subject', 'Subject'),
(351, 'receiver_name', 'Send To'),
(352, 'select_user', 'Select User'),
(353, 'message_sent', 'Messages Sent'),
(354, 'mail', 'Mail'),
(355, 'send_mail', 'Send Mail'),
(356, 'mail_setting', 'Mail Setting'),
(357, 'protocol', 'Protocol'),
(358, 'mailpath', 'Mail Path'),
(359, 'mailtype', 'Mail Type'),
(360, 'validate_email', 'Validate Email Address'),
(361, 'true', 'True'),
(362, 'false', 'False'),
(363, 'attach_file', 'Attach File'),
(364, 'wordwrap', 'Enable Word Wrap'),
(365, 'send', 'Send'),
(366, 'upload_successfully', 'Upload Successfully!'),
(367, 'app_setting', 'App Setting'),
(368, 'case_manager', 'Case Manager'),
(369, 'patient_status', 'Patient Status'),
(370, 'patient_status_edit', 'Edit Patient Status'),
(371, 'add_patient_status', 'Add Patient Status'),
(372, 'add_new_status', 'Add New Status'),
(373, 'case_manager_list', 'Case Manager List'),
(374, 'hospital_address', 'Hospital Address'),
(375, 'ref_doctor_name', 'Ref. Doctor Name'),
(376, 'hospital_name', 'Hospital Name'),
(377, 'patient_name', 'Patient  Name'),
(378, 'document_list', 'Document List'),
(379, 'add_document', 'Add Document'),
(380, 'upload_by', 'Upload By'),
(381, 'documents', 'Documents'),
(382, 'prescription', 'Prescription'),
(383, 'add_prescription', 'Add Prescription'),
(384, 'prescription_list', 'Prescription List'),
(385, 'add_insurance', 'Add Insurance'),
(386, 'insurance_list', 'Insurance List'),
(387, 'insurance_name', 'Insurance Name'),
(388, 'medicine_name', 'Medicine Name'),
(389, 'add_medicine', 'Add Medicine'),
(390, 'medicine_list', 'Medicine List'),
(391, 'add_patient_case_study', 'Add Patient Case Study'),
(392, 'patient_case_study_list', 'Patient Case Study List'),
(393, 'food_allergies', 'Food Allergies'),
(394, 'tendency_bleed', 'Tendency Bleed'),
(395, 'heart_disease', 'Heart Disease'),
(396, 'high_blood_pressure', 'High Blood Pressure'),
(397, 'diabetic', 'Diabetic'),
(398, 'surgery', 'Surgery'),
(399, 'accident', 'Accident'),
(400, 'others', 'Others'),
(401, 'family_medical_history', 'Family Medical History'),
(402, 'current_medication', 'Current Medication'),
(403, 'female_pregnancy', 'Female Pregnancy'),
(404, 'breast_feeding', 'Breast Feeding'),
(405, 'health_insurance', 'Health Insurance'),
(406, 'low_income', 'Low Income'),
(407, 'reference', 'Reference'),
(408, 'status', 'Status'),
(409, 'medicine_name', 'Medicine Name'),
(410, 'instruction', 'Instruction'),
(411, 'medicine_type', 'Medicine Type'),
(412, 'days', 'Days'),
(413, 'weight', 'Weight'),
(414, 'blood_pressure', 'Blood Pressure'),
(415, 'old', 'Old'),
(416, 'new', 'New'),
(417, 'case_study', 'Case Study'),
(418, 'chief_complain', 'Chief Complain'),
(419, 'patient_notes', 'Patient Notes'),
(420, 'visiting_fees', 'Visiting Fees'),
(421, 'diagnosis', 'Diagnosis'),
(422, 'prescription_id', 'Prescription ID'),
(423, 'name', 'Name'),
(424, 'prescription_information', 'Prescription Information'),
(425, 'stock', 'Stock'),
(426, 'stock_list', 'Stock List'),
(427, 'consultation_fee', 'Consultation Fee'),
(429, 'doctor_cons_fee', 'Consultation Fee'),
(430, 'amount', 'Amount'),
(431, 'paid', 'Paid'),
(432, 'balance', 'Balance'),
(433, 'account', 'Account'),
(434, 'add_transaction', 'Add Transaction'),
(435, 'unit', 'Unit'),
(436, 'strip', 'Strip'),
(437, 'bottle', 'Bottle'),
(438, 'batchNo', 'Batch No'),
(439, 'expiry_date', 'Expiry Date'),
(440, 'manufac_date', 'Manufacturing Date '),
(441, 'mrp', 'MRP'),
(442, 'purchaseValue', 'Purchase Value'),
(443, 'quantity', 'Quantity'),
(444, 'tabletsPerStrip', 'Tablets Per Strip'),
(445, 'taxPercentage', 'Tax Percentage'),
(446, 'sale', 'Sale'),
(447, 'purchase', 'Purchase'),
(448, 'cash', 'Cash'),
(449, 'cashType', 'Cash/Credit'),
(450, 'billNo', 'Bill No'),
(451, 'itemName', 'Item Name'),
(452, 'netValue', 'Net Value'),
(453, 'purchase_list', 'Purchase List'),
(454, 'addPurchase', 'Add Purchase'),
(455, 'add_supplier', 'Add Supplier'),
(456, 'list_supplier', 'Supplier List'),
(457, 'list_sale', 'Sale List'),
(458, 'company', 'Company'),
(459, 'update_supplier', 'Update Supplier'),
(460, 'select_supplier', 'Select Supplier'),
(461, 'supplier', 'Supplier'),
(462, 'cash_credit', 'Cash/Credit'),
(463, 'Admin-Scientist', 'Admin-Scientist'),
(464, 'Admin-Nadu', 'Admin-Nadu'),
(465, 'Admin-Rafeeq', 'Admin-Rafeeq'),
(466, 'Mrs_Admin', 'Mrs Admin'),
(467, 'Co-Admin', 'Co-Admin'),
(468, 'picture_manager', 'Picture Manager'),
(469, 'picture_list', 'Picture List'),
(470, 'add_picture', 'Add Picture'),
(471, 'list_picture', 'Picture List'),
(472, 'thumbnail', 'Thumbnail'),
(473, 'picture_information', 'Picture Information'),
(474, 'normal_user', 'Officier Incharge'),
(475, 'settings', 'Settings'),
(476, 'content', 'Content'),
(477, 'add_content', 'Add Content'),
(478, 'edit_content', 'Edit Content'),
(479, 'delete_content', 'Delete Content'),
(480, 'view_content', 'View Content'),
(481, 'add_new_content', 'Add New Content'),
(482, 'incharge', 'Officer Incharge'),
(483, 'districtcomm', 'District Commissioner'),
(484, 'district', 'District'),
(485, 'room_capacity', 'Room Capacity'),
(486, 'add_bed', 'Add Bed'),
(487, 'bed_status', 'Bed Status'),
(488, 'report_status', 'Report Status'),
(489, 'positive', '+ve'),
(490, 'negative', '-ve'),
(491, 'completed', 'Surveillance Completed'),
(492, 'yes', 'Yes'),
(493, 'no', 'No'),
(494, 'admitted', 'Admitted at'),
(495, 'center', 'Center'),
(496, 'add_center', 'Add Center'),
(497, 'list_center', 'List Center'),
(498, 'add_user', 'Add User'),
(499, 'view_user', 'View User'),
(500, 'center_category', 'Center Category'),
(501, 'view_category', 'View Category'),
(502, 'add_category', 'Add Category'),
(503, 'catagory', 'Catagory'),
(504, 'select_category', 'Select Category'),
(505, 'select_incharge', 'Select Incharge'),
(506, 'rooms', 'Rooms'),
(507, 'total_rooms', 'Total Rooms'),
(508, 'beds', 'Beds'),
(509, 'total_beds', 'Total Beds'),
(510, 'incharge_list', 'Officier Incharge List'),
(511, 'districtmagistrate', 'District Magistrate'),
(512, 'divisionalcommissionar', 'Divisional Commissionar'),
(513, 'Officer_Incharge_list', 'Officer Incharge List'),
(514, 'District_Magistrate_list', 'District Magistrate List'),
(515, 'Divisional_Commissionar_list', 'Divisional Commissionar List'),
(516, 'view_incharge', 'View Incharge'),
(517, 'view_dm', 'View District Magistrate'),
(518, 'view_dc', 'View Divisional Commissionar'),
(519, 'user_id', 'User Id'),
(520, 'd_pop', 'Place Of Posting'),
(521, 'contact_no', 'Contact No'),
(522, 'short_suv_completed', 'Suvr Complted'),
(523, 'select_center', 'Select Center'),
(524, 'search', 'Search'),
(525, 'add_administration', 'Add Administration'),
(526, 'administration_list', 'Administration List'),
(527, 'administration', 'Administration'),
(528, 'hospital', 'Hospital'),
(529, 'add_hospital', 'Add Hospital'),
(530, 'hospital_list', 'List Hospital'),
(531, 'add_volunter', 'Add Volunter'),
(532, 'volunter_list', 'List Volunter'),
(533, 'volunter', 'Volunter'),
(534, 'volunter_name', 'Volunter Name'),
(535, 'administration_name', 'Administration Name'),
(538, 'travel', 'Travel History / Symptoms'),
(539, 'sample_result', 'Sample Result'),
(540, 'sample_collected', 'Sample Collected'),
(541, 'deceased', 'Deceased'),
(542, 'recovered', 'Recovered'),
(543, 'res_awaited', 'Result Awaited'),
(544, 'stage', 'Stage'),
(545, 'org_name', 'Organisation Name'),
(546, 'view_reports', 'View Reports'),
(547, 'add_report', 'Add Report'),
(548, 'report_list', 'Report List'),
(549, 'select_patient', 'Select Patient'),
(550, 'add_patient', 'Add Patient'),
(551, 'downloadable', 'Downloadable'),
(552, 'report_title', 'Report Title'),
(553, 'incorrect_patient_id_phone', 'Incorrect Patient Id/Phone Number'),
(554, 'feedback_message', 'Feedback/Messages'),
(555, 'contactus', 'Contact Us'),
(556, 'clustercoordinator', 'Cluster Coordinator'),
(557, 'animator', 'Animator'),
(558, 'cfo', 'CFO'),
(559, 'student', 'Student'),
(560, 'org', 'Organisation'),
(561, 'cluster', 'Cluster'),
(562, 'add_cluster', 'Add Cluster'),
(563, 'list_cluster', 'List Cluster'),
(564, 'organisation', 'Organisation'),
(565, 'add_org', 'Add Organisation'),
(566, 'list_org', 'List Organisation'),
(567, 'org_head', 'Organisation Head'),
(568, 'coodinator', 'Coodinator'),
(569, 'cluster_name', 'Cluster Name'),
(570, 'center_name', 'Center Name'),
(571, 'animator', 'Animator'),
(572, 'user', 'User'),
(573, 'add_student', 'Add Student'),
(574, 'add_member', 'Add Member'),
(575, 'list_student', 'List Students'),
(576, 'list_user', 'List Users'),
(577, 'block', 'Block'),
(578, 'village', 'Village'),
(579, 'school_type', 'School Type'),
(580, 'school_level', 'School Level'),
(581, 'school_name', 'School Name'),
(582, 'father_name', 'Fathers Name'),
(583, 'father_occup', 'Fathers Occup'),
(584, 'mother_name', 'Mothers Name'),
(585, 'mother_occup', 'Mothers Occup'),
(586, 'socail_status', 'Social Status'),
(587, 'school_status', 'School Status');

-- --------------------------------------------------------

--
-- Table structure for table `mail_setting`
--

CREATE TABLE `mail_setting` (
  `id` int(11) NOT NULL,
  `protocol` varchar(20) NOT NULL,
  `mailpath` varchar(255) NOT NULL,
  `mailtype` varchar(20) NOT NULL,
  `validate_email` varchar(20) NOT NULL,
  `wordwrap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail_setting`
--

INSERT INTO `mail_setting` (`id`, `protocol`, `mailpath`, `mailtype`, `validate_email`, `wordwrap`) VALUES
(5, 'sendmail', '/usr/sbin/sendmail', 'html', 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `org_id` int(10) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_district` varchar(200) NOT NULL,
  `org_head_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`org_id`, `org_name`, `org_district`, `org_head_id`) VALUES
(1, 'KWIDE', 'Srinagar', '3');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `firstname`, `email`, `password`, `phone`, `address`, `district`, `date_of_birth`, `picture`, `created_by`, `create_date`, `status`) VALUES
(1, 'P3470JXCX', 'Wasi Rashie', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '7890123212', 'Gangabal ', 'Shopian', '2020-03-23', 'siteassets/images/users/2020-04-23/t1.jpg', 1, '2020-04-23', 1),
(2, 'PUVGIH7V', 'Gul Shahi', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '9906836522', 'Kashan', 'Doda', '1970-01-01', 'siteassets/images/users/2020-04-23/t2.jpg', 1, '2020-04-23', 1),
(22, 'PI1XWEV6', 'Saqib Shafi', NULL, NULL, '7006784523', 'Kulusa', 'Bandipore', NULL, 'siteassets/images/users/2020-04-23/t.jpg', 1, '2020-04-23', 1),
(23, 'PCJXUU17', 'Mohammad Akbar', NULL, NULL, '1234567890', 'Srinagar', 'Anantnag', NULL, 'siteassets/images/users/2020-04-23/h.jpg', 1, '2020-04-25', 1),
(28, 'P7XOIPXH', 'Aamir', NULL, NULL, '7006939042', 'Safaopora', 'Ganderbal', NULL, NULL, 1, '2020-05-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `r_id` int(11) NOT NULL,
  `r_patient_id` varchar(20) NOT NULL,
  `r_name` varchar(300) NOT NULL,
  `r_report` varchar(300) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `r_downloadable` tinyint(1) NOT NULL,
  `r_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`r_id`, `r_patient_id`, `r_name`, `r_report`, `r_date`, `r_downloadable`, `r_status`) VALUES
(2, 'PUVGIH7V', 'Test 1', './uploads/report/admin_adminlte_2___invoice.pdf', '2020-04-27 10:04:20', 1, 1),
(3, 'P3470JXCX', 'KFT', './uploads/report/admin_fetchallinvestorforparticularsite__realestate_db___investor___phpmyadmin_4.pdf', '2020-04-24 11:04:55', 1, 1),
(13, 'P7XOIPXH', 'Kkkt', './uploads/report/admin_computer_science_depatrment_advertisment__a61afa83-b2cf-4313-bc0e-9971224ae3291.pdf', '2020-05-14 09:05:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `title`, `description`, `email`, `phone`, `logo`, `favicon`, `language`, `site_align`, `footer_text`) VALUES
(2, 'REP', 'Safapora Ganderbal', 'valley.vdc@gmail.com', '0194-2314919', 'siteassets/images/apps/2020-04-30/B.png', 'siteassets/images/icons/2020-04-21/l.png', 'english', 'LTR', '2020©Copyright RFP');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `user_role` tinyint(1) NOT NULL,
  `picture` varchar(50) CHARACTER SET utf8 NOT NULL,
  `district` varchar(200) NOT NULL,
  `block` varchar(200) NOT NULL,
  `village` varchar(200) NOT NULL,
  `school_type` varchar(100) NOT NULL,
  `school_level` varchar(100) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `class` varchar(10) NOT NULL,
  `school_status` varchar(50) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `father_occup` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `mother_occup` varchar(100) NOT NULL,
  `socail_status` varchar(20) NOT NULL,
  `center_id` int(11) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `firstname`, `mobile`, `email`, `password`, `user_role`, `picture`, `district`, `block`, `village`, `school_type`, `school_level`, `school_name`, `sex`, `age`, `class`, `school_status`, `father_name`, `father_occup`, `mother_name`, `mother_occup`, `socail_status`, `center_id`, `remarks`, `created_by`, `create_date`, `update_date`, `status`) VALUES
(2, 'Dilawer Hussain', '', '', '', 4, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(3, 'Org Head 1', '', '', '', 2, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(4, 'TASEENA NAZIR', '', '', '', 3, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(5, 'Nowsheeda Majeed', '', '', '', 4, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(6, 'TAHIR WANI', '', '', '', 3, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(7, 'ALIYA PANDIT', '', '', '', 3, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(8, 'ZUBAIR AHMAD', '', '', '', 3, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(9, 'IQRA QAYOOM', '', '', '', 3, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(10, 'Ishfaq Ahmad', '', '', '', 4, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(11, 'Atila Shah', '', '', '', 4, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(12, 'Iqra Mukhtar', '', '', '', 4, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(13, 'Iqra Ashraf', '', '', '', 4, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(14, 'Bisma Fayaz', '', '', '', 4, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 1, '2020-07-19', '2020-07-19', 1),
(15, 'Gowhar', '9909009909', 'gowhar@gmail.com', '296deb6af72336606b109e341f0e850d', 5, '', 'Budgam', 'khag', 'Dalwash', 'Govt.', 'Primary', 'G P S dalwash', 'boy', 9, '3rd', 'School going', 'fayaz.ah.sheikh', 'cook', 'mehbooba', 'shawl work', 'RBA', 21, '', 1, '2017-11-01', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `user_role` tinyint(1) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `consfee` int(11) NOT NULL COMMENT 'Doctors Consultation Fee',
  `short_biography` text,
  `picture` varchar(50) DEFAULT NULL,
  `specialist` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `user_role`, `designation`, `department_id`, `address`, `district`, `phone`, `mobile`, `consfee`, `short_biography`, `picture`, `specialist`, `date_of_birth`, `sex`, `blood_group`, `degree`, `created_by`, `create_date`, `update_date`, `status`) VALUES
(1, 'Admin', 'CFO', 'rfp@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL, 'Srinagar, JK', '', NULL, '9906009906', 0, NULL, 'siteassets/images/users/2020-04-21/g.jpg', NULL, '1970-01-01', 'Male', NULL, NULL, 1, '2020-07-18', NULL, 1),
(2, 'Organisation', 'One', 'rfp@org.com', '21232f297a57a5a743894a0e4a801fc3', 2, NULL, NULL, 'Srinagar, JK', '', NULL, '9906009906', 0, NULL, 'siteassets/images/users/2020-04-21/g.jpg', NULL, '1970-01-01', 'Male', NULL, NULL, 2, '2020-07-18', NULL, 1),
(3, 'Coodiator', 'One', 'rfp@cor.com', '21232f297a57a5a743894a0e4a801fc3', 3, NULL, NULL, 'Srinagar, JK', '', NULL, '9906009906', 0, NULL, 'siteassets/images/users/2020-04-21/g.jpg', NULL, '1970-01-01', 'Male', NULL, NULL, 1, '2020-06-28', NULL, 1),
(4, 'Animator', 'One', 'rfp@ani.com', '21232f297a57a5a743894a0e4a801fc3', 4, NULL, NULL, 'Srinagar, JK', '', NULL, '9906009906', 0, NULL, 'siteassets/images/users/2020-04-21/g.jpg', NULL, '1970-01-01', 'Male', NULL, NULL, 4, '2020-07-18', NULL, 1),
(5, 'Student', 'One', 'rfp@std.com', 'd2229cc70e64ae7c07361778573c4e0c', 5, NULL, NULL, 'Srinagar, JK', '', NULL, '9906009906', 0, NULL, 'siteassets/images/users/2020-04-21/g.jpg', NULL, '1970-01-01', 'Male', NULL, NULL, 5, '2020-07-18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `ur_id` int(11) NOT NULL COMMENT 'UserRoleId',
  `ur_role` varchar(200) NOT NULL COMMENT 'UserRole',
  `ur_date_of_creation` datetime NOT NULL COMMENT 'Date Of Creation',
  `ur_status` int(11) NOT NULL DEFAULT '1' COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ur_id`, `ur_role`, `ur_date_of_creation`, `ur_status`) VALUES
(1, 'admin', '2020-01-13 00:00:00', 1),
(2, 'org', '2020-01-13 00:00:00', 1),
(3, 'clustercoordinator', '2020-01-13 00:00:00', 1),
(4, 'animator', '2020-01-13 00:00:00', 1),
(5, 'student', '2020-01-13 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`cluster_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_setting`
--
ALTER TABLE `mail_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `patient_id` (`r_patient_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `cluster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=588;

--
-- AUTO_INCREMENT for table `mail_setting`
--
ALTER TABLE `mail_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `org_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'UserRoleId', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
