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
- [x] Add a tab called “Openings” where I can show advertisement (a post)
- [x] Team Alumni, show only name if there is no image
- [x] PhD students, Master and Undergraduate Students, Team Alumni
- [x] More contrasts in the publications list.
- [x] Cut the text in abstract of each project if it is too long. Add something like “more”.
- [x] Remove the publications below the abstract. Only show that in the full description page.
- [x] Separate posts from the asbtract and the full descriptions. In project description page, Show “Related Publications"
- [x] In the home page, put the Talks and Demos below selected publications and news.
- [ ] Under the lab description, add one button “Join CASTL”, which links to the the “Opening” page. Similar to this one: https://deep-real.github.io/index.html. By the way, I decided to change abbreviation of our lab to CASTL short for “Computer Architecture and SysTem-research Lab”. We might need to change the url. But we can consider doing that later.
- [x] Change the page table order as follows: HOME, TEAM, PUBLICATIONS, PROJECTS, OPENINGS and NEWS.
- [x] In the project page, no need to show Team Members. Also, make the text limit a little longer so that it can show say one paragraph. Currently there is a cutoff in the second sentence.
- [x] Publication page, put the “Archived Papers” on top.
- [x] Team page. No longer needed to show the Lab name and description since it will be added in the home page.
- [x] Also, could you add a horizontal line and some white space after the Principle Investigator (same as the Current Team Members)?
- [x] For the full publications page, there are a couple of things I think we can add into the style, including make the title text bold etc. One example text style I like is this one: https://gruss.cc. (Note that I only talked about color/fonts, our current layout/format of the publications look fine. e.g., no need to make my name bold).
- [x] Additionally, the icons for paper, talk, slides and so on do not seem to be very compatible with the overall theme (e.g., relatively small and crowed). I would rather use boxed text, examples can be found here: https://mguarnieri.github.io/publication/. When hover on the text boxes (e.g, PDF), it can show a black background color. Note that you can do all the fine-tuning for the style you can where you see fit. It does not have to be exactly the same as the examples I sent you. Screenshots are listed here:
- [x] For selected publications, it would be good to show the abbreviation of the conference/journal on the left side and then the detailed paper information on the right side. One example I can find is below: https://www.cs.ucr.edu/~zhiyunq/. Of course, we can keep our color/style for the texts in our full publication page.
- [x] Also, I do need to have the control of papers in Selected publications, which may not be the same as the one in full publications page.



## Explanatory Notes

Change list:

