# {{My Project}}

{{Brief description of this theme}}.  Built with the [Athena Framework](https://ucf.github.io/Athena-Framework/).

## Quick links

* [**Theme Documentation**](https://github.com/UCF/{{My-Project}}/wiki)
* [Development](#development)
* [Contributing](#contributing)

-----

## Documentation

Head over to the [{{My Project}} wiki](https://github.com/UCF/{{My-Project}}/wiki) for detailed information about this theme, installation instructions, and more.

-----

## Development

Note that compiled, minified css and js files are included within the repo.  Changes to these files should be tracked via git (so that users installing the theme using traditional installation methods will have a working theme out-of-the-box.)

[Enabling debug mode](https://codex.wordpress.org/Debugging_in_WordPress) in your `wp-config.php` file is recommended during development to help catch warnings and bugs.

### Requirements
* node
* gulp-cli

### Instructions
1. Clone the {{My-Project}} repo into your local development environment, within your WordPress installation's `themes/` directory: `git clone https://github.com/UCF/{{My-Project}}.git`
2. `cd` into the new {{My-Project}} directory, and run `npm install` to install required packages for development into `node_modules/` within the repo
3. Optional: If you'd like to enable [BrowserSync](https://browsersync.io) for local development, or make other changes to this project's default gulp configuration, copy `gulp-config.template.json`, make any desired changes, and save as `gulp-config.json`.

    To enable BrowserSync, set `sync` to `true` and assign `syncTarget` the base URL of a site on your local WordPress instance that will use this theme, such as `http://localhost/wordpress/my-site/`.  Your `syncTarget` value will vary depending on your local host setup.

    The full list of modifiable config values can be viewed in `gulpfile.js` (see `config` variable).
3. Run `gulp default` to process front-end assets.
4. If you haven't already done so, create a new WordPress site on your development environment, and [install and activate theme dependencies](https://github.com/UCF/{{My-Project}}/wiki/Installation#installation-requirements).
5. Set {{My Project}} as the active theme.
6. Make sure you've completed [all theme configuration steps](https://github.com/UCF/{{My-Project}}/wiki/Installation#theme-configuration).
7. Run `gulp watch` to continuously watch changes to scss and js files.  If you enabled BrowserSync in `gulp-config.json`, it will also reload your browser when scss or js files change.


## Contributing

Want to submit a bug report or feature request?  Check out our [contributing guidelines](https://github.com/UCF/{{My-Project}}/blob/master/CONTRIBUTING.md) for more information.  We'd love to hear from you!


# Notes
- [x] Remove blue bar for headings
- [x] No projects on the main page, only specific page
- [x] No team members for the main page
- [x] add bio page --> Linking to existing personal page
- [X] show selected publications on the project summary page. simple list to save space.
- [x] add selected publications for the main page (4 for now)
- [x] make icons smaller
- [x] Move my information from the home page to the team page. Add team lab intro to the top of the home page. (I will send you the intro later).
- [x] Title of the section to be “Principal Investigator”.
- [x] Make it rectangle instead of round.
- [x] Remove the bio tab page
- [x] White space between Selected publications and News
- [ ] Change of style for papers in selected publications (I will send example)
- [x] Can I change the order of publications as I want? (Both in Selected Publications and publication page) .
- [x] Add one section called “Archived Papers” (automatically hidden if there is no papers). One horizontal one for each year only. No need to have them in between every paper
- [X] One line for news. In both home page and news page. Only show category icon, everything else should be editable as post/new.
- [x] Add one section “Talks and Demos”. On horizontal row. Title and Video/Image. Example: https://deep-real.github.io/index.html
- [x] Color style: black and white for now
- [x] Sponsor. Only show it as footer in first page. Make it centered
- [x] All image are either not shown properly or not appear at all
- [x] For team members, one row for each member. Left side, photo, right side, name, position. Email (+personal page link) address and one paragraph of self introduction.
- [ ] Add a tab called “Openings” where I can show advertisement (a post)
- [x] Team Alumni, show only name if there is no image
- [x] PhD students, Master and Undergraduate Students, Team Alumni
- [x] More contrasts in the publications list.
- [x] Cut the text in abstract of each project if it is too long. Add something like “more”.
- [x] Remove the publications below the abstract. Only show that in the full description page.
- [x] Separate posts from the asbtract and the full descriptions. In project description page, Show “Related Publications"


## Explanatory Notes

Change list:
- The Home page now contains a "Talks and Demos" section that is automatically generated from items enterd in the "Talks" section of the admin dashboard. Talks/Demos must have either an image or a video url to embed (please note the embed format specified above the video url field - incorrectly formatted YouTube links cannot be embedded). They are displayed in the order specified by the "Display Order" form field.
- The videos and images are all set to display in a 16:9 aspect ratio to maintain uniformity. Let me know if you would prefer a different aspect ratio.
- The top segment of the Home page now contains a section with an image background that can be updated from the Edit page for the Home page. This is where the image from the content box will be displayed. The background image automatically has a darkening filter applied to it, which should allow you to upload different images without needing to edit them first if you want to change the background. The text has a small black halo to increase contrast and readability against the background.
- The white space between the selected publications and news se
- The bio section has been removed from the home page. It is now added on the Team page and has the requested "Principle Investigator" title. The bio image is now rectangular.
- The icon color has been changed to black and white.
- The Sponsor section is now only on the home page and has the content centered.
- Projects now have a "project abstract" field (200 characters max). If no abstract is entered, the first 200 characters of the project description are used. The rest will be cut off, and a "View More" button has been added below each project entry.
- The size of Project images on the list page has been decreased to match the shorter abstract.
- Projects now have a field to control their display order. Projects whose display order is not explicity set will be shown in order from newest entries to oldest.
- Projects will no longer display related publications.
- News items are now set to be a single row, on both the Home page and the News page.
- Previously news items were mistakenly set to strip HTML tags when displaying the text content. That has been corrected and the formatting will now be fully controllable.
- Publications now have a two order settings: one for selected publication position on the front page, and one for their order as part of the full publication list. A note about the publication order: currently, the ordering affects the order within the publication year. So for example, a publication from 2020 with order #1 will be displayed first in the 2020 section, not first in the list overall. The order for the regular publication page and the selected publication list are set independently, so they do not need to be the same value, and if you want one or both can be left blank, allowing the publication to appear in its normal chronological position. Publications appear within their year group in order from newest to oldest.
- Selected publications will also default to sorting newest to oldest for items where a specific order is not provided.
- On the full publication list, an archive section is automatically generated for any papers from 3 years ago (so currently the archive would begin in 2018) or older. The archive heading will disappear and the section will be blank if no papers fit the criteria.
- The lines between individual publications have been removed
- The text on the publication titles has been changed to a darker color for increased contrast. If you still feel like it's a little off, this might be a helpful tool for finding a color that you like: https://htmlcolorcodes.com/color-picker/. Just let me know the hex code and I can swap it out.
- Team members entries now have a Role field (updated as a dropdown selector to use for the auto-sorting), a Personal Link field, and a Display Order field. For team members where a display order is not specified, they will be displayed alphabetically by last name.
- The team members will automatically be sorted and displayed by Role.
-
