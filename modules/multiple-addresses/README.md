# WooCommerce Multiple Addresses

A WordPress plugin that enables customers to save and manage multiple shipping addresses in their WooCommerce account and easily select them during checkout.

## Features

### Account Page - Address Management

- **Dedicated Address Management Page**: A new "My Addresses" section in the customer account menu
- **Add Addresses**: Create unlimited shipping addresses with comprehensive details
- **Edit Addresses**: Modify existing saved addresses at any time
- **Delete Addresses**: Remove addresses that are no longer needed
- **Set Default Address**: Mark one address as default for automatic selection at checkout
- **Visual Indicators**: Clear labels showing which address is set as default

### Checkout Page - Address Selection

- **Quick Address Selection**: Dropdown menu displaying all saved addresses
- **Auto-Fill Form**: Automatically populates shipping fields when an address is selected
- **New Address Option**: Ability to enter a new address on-the-fly during checkout
- **Default Pre-Selection**: The default address is automatically selected for faster checkout
- **Seamless Integration**: Works with standard WooCommerce checkout flow

### Address Information Captured

Each address can store:
- First Name
- Last Name
- Company (optional)
- Address Line 1
- Address Line 2 (optional)
- City
- State/County
- Postcode/ZIP
- Country
- Phone Number (optional)

## Installation

### Method 1: Manual Installation

1. Download or create the plugin file `wc-multiple-addresses.php`
2. Create a new folder named `wc-multiple-addresses` in your WordPress installation at:
   ```
   wp-content/plugins/wc-multiple-addresses/
   ```
3. Place the `wc-multiple-addresses.php` file inside this folder
4. Go to WordPress Admin Dashboard
5. Navigate to **Plugins > Installed Plugins**
6. Find "WooCommerce Multiple Addresses" in the list
7. Click **Activate**

### Method 2: Upload via WordPress Admin

1. Go to WordPress Admin Dashboard
2. Navigate to **Plugins > Add New**
3. Click **Upload Plugin**
4. Choose the plugin ZIP file
5. Click **Install Now**
6. Click **Activate Plugin**

## Requirements

- WordPress 5.0 or higher
- WooCommerce 5.0 or higher
- PHP 7.2 or higher

## How to Use

### For Customers - Managing Addresses

1. **Access Address Management**:
   - Log in to your account
   - Navigate to **My Account**
   - Click on **My Addresses** in the account menu

2. **Add a New Address**:
   - Click the **Add New Address** button
   - Fill in all required fields (marked with *)
   - Click **Save Address**
   - The page will refresh and display your new address

3. **Edit an Existing Address**:
   - Find the address you want to modify
   - Click the **Edit** button below that address
   - Update the fields as needed
   - Click **Save Address**

4. **Delete an Address**:
   - Find the address you want to remove
   - Click the **Delete** button
   - Confirm the deletion in the popup dialog
   - The address will be permanently removed

5. **Set a Default Address**:
   - Find the address you want to set as default
   - Click the **Set as Default** button
   - This address will now be pre-selected at checkout
   - The default address displays a blue "Default" badge

### For Customers - Using Addresses at Checkout

1. **During Checkout**:
   - Proceed to checkout as normal
   - Look for the **Select Shipping Address** dropdown
   - Your default address will be automatically selected and filled in

2. **Selecting a Different Address**:
   - Click the dropdown menu
   - Select any of your saved addresses
   - The shipping form will automatically update with that address

3. **Using a New Address**:
   - Select "Enter new address" from the dropdown
   - Manually fill in the shipping form fields
   - This new address won't be saved automatically (add it from My Account later)

## Technical Details

### Data Storage

- Addresses are stored in WordPress user meta as `_wc_multiple_addresses`
- Default address ID is stored as `_wc_default_address_id`
- Each address has a unique identifier (e.g., `addr_6789abcdef123`)
- Order meta stores the selected address ID for reference

### Security

- AJAX requests are protected with WordPress nonces
- All input data is sanitized before saving
- User authentication is required for all operations
- Only logged-in users can access address management features

### Compatibility

- Works with standard WooCommerce checkout
- Compatible with most WooCommerce themes
- Does not override WooCommerce core functionality
- Can coexist with other WooCommerce extensions

## Troubleshooting

### "My Addresses" menu item not appearing

1. Make sure the plugin is activated
2. Clear your browser cache
3. Try logging out and back in
4. Check if WooCommerce is properly installed and activated

### Addresses not saving

1. Verify you're logged in
2. Check that all required fields are filled (marked with *)
3. Check browser console for JavaScript errors
4. Ensure you have proper user permissions

### Address dropdown not showing at checkout

1. Confirm you have at least one saved address
2. Make sure you're logged in during checkout
3. Clear cache (browser and any caching plugins)
4. Check if your theme overrides WooCommerce checkout templates

### Page not reloading after saving/deleting

1. Check browser console for JavaScript errors
2. Verify jQuery is loading properly
3. Test with a default WordPress theme to rule out theme conflicts
4. Disable other plugins temporarily to identify conflicts

## Customization

The plugin is designed to work out-of-the-box without styling to match your theme's design. You can add custom CSS in your theme to style:

- `.woocommerce-addresses` - Main container
- `.address-item` - Individual address blocks
- `#address-form` - Address form container
- `.woocommerce-shipping-addresses` - Checkout address selector

## Support

For issues, feature requests, or questions:
- Check the troubleshooting section above
- Review WooCommerce and WordPress logs
- Ensure all requirements are met
- Test with default theme and no other plugins

## Changelog

### Version 1.0.0
- Initial release
- Account page address management
- Checkout address selection
- Default address functionality
- AJAX-powered interface

## License

This plugin is provided as-is without warranty. Use at your own discretion.