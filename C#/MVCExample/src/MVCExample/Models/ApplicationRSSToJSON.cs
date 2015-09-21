using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Threading.Tasks;
using System.Xml;

namespace MVCExample.Models
{
    public class ApplicationRSSToJSON
    {
        public async Task<string> fetchUrl(string url)
        {
            var request = new HttpClient();
            return await request.GetStringAsync(url);
        }

        public async Task<List<Link>> GetReutersTechRss()
        {
            var list = new List<Link>();
            var data = await fetchUrl("http://feeds.reuters.com/reuters/technologyNews?format=xml");

            if (data != null)
            {
                var xmlDoc = new XmlDocument();
                xmlDoc.LoadXml(data);
                var ns = new XmlNamespaceManager(xmlDoc.NameTable);
                ns.AddNamespace("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
                ns.AddNamespace("taxo", "http://purl.org/rss/1.0/modules/taxonomy/");
                ns.AddNamespace("dc", "http://purl.org/dc/elements/1.1/");
                ns.AddNamespace("itunes", "http://www.itunes.com/dtds/podcast-1.0.dtd");
                ns.AddNamespace("feedburner", "http://rssnamespace.org/feedburner/ext/1.0");

                XmlNodeList urlList;

                urlList = xmlDoc.SelectNodes("//item", ns);

                foreach(XmlNode node in urlList)
                {
                    var myNode = node;
                    list.Add(new Link()
                    {
                        Title = node["title"].InnerText,
                        Url = node["link"].InnerText,
                        Description = node["description"].InnerText
                    });
                }
            }

            return list;
        }
    }
}
