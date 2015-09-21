using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNet.Mvc;
using MVCExample.Models;
using Newtonsoft.Json;
using MVCExample.ViewModels.Url;

// For more information on enabling MVC for empty projects, visit http://go.microsoft.com/fwlink/?LinkID=397860

namespace MVCExample.Controllers
{
    public class UrlController : Controller
    {
        // GET: /<controller>/
        public IActionResult Index()
        {
            return View();
        }

        [Produces("application/json")]
        public async Task<IActionResult> GetReutersTechRss()
        {
            var request = new ApplicationRSSToJSON();

            var data = await request.GetReutersTechRss();

            var model = new Urls()
            {
                Links = data
            };
           
            return PartialView(model);
        }
    }
}