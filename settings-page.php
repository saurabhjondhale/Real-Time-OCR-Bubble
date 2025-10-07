<div class="wrap">
  <h1>Heritage_Foundation_Real-Time OCR Bubble Settings</h1>
  <form method="post" action="options.php">
    <?php
      settings_fields('heritage_ocr_settings_group');
      $options = get_option('heritage_ocr_settings');
    ?>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">Bubble Color</th>
        <td><input type="color" name="heritage_ocr_settings[color]" value="<?php echo esc_attr($options['color'] ?? '#B66A50'); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">Bubble Icon</th>
        <td><input type="text" name="heritage_ocr_settings[icon]" value="<?php echo esc_attr($options['icon'] ?? '🏺'); ?>" /> (e.g., 🏺 or 📜)</td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>
</div>

