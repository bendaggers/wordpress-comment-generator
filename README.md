# Custom Comments Plugin

The Custom Comments Plugin is a WordPress plugin that allows you to easily add comments to published posts with various customization options. This plugin provides a user-friendly interface to select posts, set comment dates, and enter comment details.

## Installation

1. Download the plugin ZIP file from the [GitHub repository](https://github.com/your/repository).
2. Navigate to your WordPress admin dashboard.
3. Go to "Plugins" > "Add New."
4. Click on the "Upload Plugin" button.
5. Choose the downloaded ZIP file and click "Install Now."
6. Once installed, click "Activate Plugin."

## Features

- **Post Selection:** Choose from a list of published posts to associate comments with.
- **Date Customization:** Set the start and end dates for comment submissions.
- **Comment Author Generation:** Automatically generate comment author names in various formats.
- **Comment Submission:** Easily submit comments with the specified author name and content.
- **Admin Menu:** Provides a dedicated menu in the WordPress admin panel for easy access.

## Usage

1. After activating the plugin, navigate to the "Custom Comments" section in your WordPress admin panel.
2. Select a post from the dropdown list that you want to add comments to.
3. Choose the start and end dates for comment submissions.
4. Fill in the comment author name and comment content.
5. Click the "Add Comment" button to submit the comment.

## Customization

The plugin allows customization of the comment author names based on three options:

1. First Name and Last Name
2. First Name, Middle Name, and Last Name
3. First Name

Additionally, you can customize the comment submission form and other settings in the plugin files.

## Implementation Details

The comment submission process is handled by the `custom_handle_comment_submission()` function defined in the `comment-handler.php` file. This function generates comment data based on user input and inserts the comment into the WordPress database.

The user agent string for comments is generated using the `generate_comment_agent()` function from the `comment-agent.php` file.

For more details about the plugin code, please refer to the code comments and docstrings provided within the plugin files.

## License

This plugin is licensed under the [GNU General Public License v2 or later](https://www.gnu.org/licenses/gpl-2.0.html).

## Contributing

Contributions are welcome! If you have suggestions or improvements, feel free to [open an issue](https://github.com/your/repository/issues) or submit a pull request.

## Support

For support and inquiries, please contact [benmichaeloracion@gmail.com](mailto:benmichaeloracion@gmail.com).

---

This plugin was developed by [BenDaggers](https://github.com/your).
# wordpress-comment-generator
