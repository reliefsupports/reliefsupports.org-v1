## Contributing to Relief Supports

Without the support of the community Relief Supports can never achieve its targets. To streamline the process of integrating different inputs from the large number of contributors, we have introduced the following guidelines to follow when opening PRs and reporting issues.

### Community
Developers can now initiate discussions through [Gitter](https://gitter.im/relief-supports/Lobby). Before starting to work on an issue, please go through the existing [issues](https://github.com/reliefsupports/reliefsupports.org/issues) and pull requests to make sure no one is working on the same issue at the time.

### Task Selection
If you can work on one of the [PRIORITY](https://github.com/reliefsupports/reliefsupports.org/labels/PRIORITY) issues it’ll be great the given the circumstance, but feel free to work on anything you want.

Once you select a task to work on, please mention that in the issue and apply the `In Progress` label for it. If it's a new issue, please [create](https://github.com/reliefsupports/reliefsupports.org/issues/new) an issue and do as same.

See the [milestones](https://github.com/reliefsupports/reliefsupports.org/milestones) page for grasp some idea where the project heading.

Even you can check the [wiki](https://github.com/reliefsupports/reliefsupports.org/wiki) also.

### Pull requests
To start contributing, simply fork the repository, commit and push your changes, and open a Pull Request. We keep `master` branch only for production release and the working branch is always is `dev`. The Pull Requests should **always** be opened against the `dev` branch.

Before you open the Pull Request, please make sure you have checked the following task list.

* Rebased against the latest fetch from the `upstream/dev` branch
* Verified for non conflicts
* Tested for functionality and regressions (preferably on the provided [Docker Test Setup](../docker/README.md) to make sure that there are no hidden dependencies to your change that would not be in the deployment)

When opening the Pull Request, please follow the provided template and provide as many details as possible for other contributors to quickly come up to speed on your contribution. This will greatly improve the chances of the Pull Request being merged quickly. Furthermore, if the change in the Pull Request contains UI changes, please include screenshots of the changed UIs as well.

### Issues
We always welcome suggestions and any bug reports that the community can provide. To organize this input, a template is provided to better describe the issue context.

Before you open an issue, please make sure that it is not reported already. If there are similar issues that do not cover your scenario, please mention them in the new issue so that a potential fix can include all similar scenarios in to one patch.
