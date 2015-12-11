<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Settings;

use Sylius\Bundle\SettingsBundle\Schema\SchemaInterface;
use Sylius\Bundle\SettingsBundle\Schema\SettingsBuilderInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PlatformSettingsSchema
 * @package Chamilo\CoreBundle\Settings
 */
class PlatformSettingsSchema implements SchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildSettings(SettingsBuilderInterface $builder)
    {
        $builder
            ->setDefaults(
                array(
                    'institution' => 'Chamilo.org',
                    'institution_url' => 'http://www.chamilo.org',
                    'site_name' => 'Chamilo site',
//                    'administrator_email' => 'admin@example.org',
//                    'administrator_name' => 'Jane',
//                    'administrator_surname' => 'Doe',
//                    'administrator_phone' => '123456',
                    'timezone' => 'Europe/Paris',
                    'theme' => 'chamilo',
                    'gravatar_enabled' => 'false',
                    'gravatar_type' => 'mm',
                    'gamification_mode' => ' ',
                    'order_user_list_by_official_code' => '',
                    'cookie_warning' => '',
                    'donotlistcampus' => '',
                    'catalog_show_courses_sessions' => '',
                    'course_catalog_hide_private' => ''
                    //
//('catalog_show_courses_sessions', '0', 'CatalogueShowOnlyCourses'),
//('catalog_show_courses_sessions', '1', 'CatalogueShowOnlySessions'),
//('catalog_show_courses_sessions', '2', 'CatalogueShowCoursesAndSessions'),
                )
            )
            ->setAllowedTypes(
                array(
                    'institution' => array('string'),
                    'institution_url' => array('string'),
                    'site_name' => array('string'),
//                    'administrator_email' => array('string'),
//                    'administrator_name' => array('string'),
//                    'administrator_surname' => array('string'),
//                    'administrator_phone' => array('string'),
                    'timezone' => array('string'),
                    'gravatar_enabled' => array('string'),
                    'gravatar_type' => array('string'),
                    //'gamification_mode' => array('string'),
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add('institution')
            ->add('institution_url', 'url')
            ->add('site_name')
//            ->add('administrator_email', 'email')
//            ->add('administrator_name')
//            ->add('administrator_surname')
//            ->add('administrator_phone')
            ->add('timezone', 'timezone')
            ->add('theme')
            ->add('gravatar_enabled', 'yes_no')
            ->add('gravatar_type')
            ->add('gamification_mode')
            ->add('order_user_list_by_official_code', 'yes_no')
            ->add('cookie_warning', 'yes_no')
            ->add('donotlistcampus', 'yes_no')
            ->add('course_catalog_hide_private', 'yes_no')
            ->add(
                'catalog_show_courses_sessions',
                'choice',
                ['choices' => [
                    '0' => 'CatalogueShowOnlyCourses',
                    '1' => 'CatalogueShowOnlySessions',
                    '2' => 'CatalogueShowCoursesAndSessions',
                ]]
            )
        ;
    }
}
