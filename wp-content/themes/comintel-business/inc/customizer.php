<?php

function comintel_web_customizer($wp_customize)
{
  // $wp_customize->add_section('sec_copyright', [
  //   'title' => 'Copyright Setting',
  //   'description' => 'Customize the copyright text',
  // ]);

  // $wp_customize->add_setting('set_copyright', [
  //   'default' => 'Copyright © 2025 PT Comintel Tamarang Pratama. All rights reserved',
  //   'sanitize_callback' => 'sanitize_text_field',
  // ]);

  // $wp_customize->add_control('set_copyright', [
  //   'label' => 'Copyright Text',
  //   'description' => 'Enter the copyright text',
  //   'section' => 'sec_copyright',
  //   'type' => 'text',
  // ]);



  $wp_customize->add_section('sec_logos', [
    'title' => 'Logos Setting',
  ]);

  $wp_customize->add_setting('set_header_logo', [
    'sanitize_callback' => 'absint',
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_header_logo', array(
    'label' => 'Header Logo',
    'section' => 'sec_logos',
    'mime_type' => 'image',
  )));

  $wp_customize->add_setting('set_footer_logo', [
    'sanitize_callback' => 'absint',
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_footer_logo', array(
    'label' => 'Footer Logo',
    'section' => 'sec_logos',
    'mime_type' => 'image',
  )));
}
add_action('customize_register', 'comintel_web_customizer');